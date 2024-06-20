from flask import Flask, render_template, request
import spacy
import PyPDF2
from docx import Document
import chardet

app = Flask(__name__)

# Load English tokenizer, tagger, parser, NER, and word vectors
nlp = spacy.load("en_core_web_md")

# Function to preprocess text
def preprocess_text(text):
    # Tokenize the text
    doc = nlp(text)
    # Lemmatize and remove stopwords and punctuation
    preprocessed_text = ' '.join(token.lemma_ for token in doc if not token.is_stop and not token.is_punct)
    return preprocessed_text

# Function to analyze resumes based on job description
def analyze_resumes(job_description, resumes):
    scores = []
    job_doc = nlp(job_description)

    for resume in resumes:
        # Read resume content
        resume_content = resume.read()
        # Detect encoding
        encoding = chardet.detect(resume_content)['encoding']
        # Provide a default encoding if detection fails
        encoding = encoding if encoding else 'utf-8'
        # Decode with detected encoding
        resume_content_decoded = resume_content.decode(encoding, errors='ignore')
        resume_content_decoded = preprocess_text(resume_content_decoded)
        resume_doc = nlp(resume_content_decoded)
        similarity_score = job_doc.similarity(resume_doc)

        scores.append({'resume_name': resume.filename, 'score': round(similarity_score * 100, 2)})

    scores.sort(key=lambda x: x['score'], reverse=True)
    return scores

@app.route('/')
def index():
    return render_template('index.html')

@app.route('/upload', methods=['POST'])
def upload():
    job_input = request.form.get('job_input')
    job_description = ''

    if job_input == 'paste':
        job_description = request.form['job_description']
    elif job_input == 'upload':
        job_file = request.files['job_file']
        if job_file.filename.endswith('.txt'):
            job_description = job_file.read().decode('utf-8')
        elif job_file.filename.endswith('.docx'):
            doc = Document(job_file)
            for para in doc.paragraphs:
                job_description += para.text
        elif job_file.filename.endswith('.pdf'):
            pdf_reader = PyPDF2.PdfFileReader(job_file)
            for page_num in range(pdf_reader.numPages):
                page = pdf_reader.getPage(page_num)
                job_description += page.extractText()

    num_resumes = int(request.form['num_resumes'])
    resumes = request.files.getlist('resumes')

    scored_resumes = analyze_resumes(job_description, resumes)
    
    return render_template('results.html', job_description=job_description, scored_resumes=scored_resumes)

if __name__ == '__main__':
    app.run(debug=False)

