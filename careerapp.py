from flask import Flask, render_template, request
import numpy as np
from keras.models import load_model
from sklearn.calibration import LabelEncoder

app = Flask(__name__)

# Initialized with default value
course = "IT"

# Dictionary mapping each course to its corresponding RNN model
course_data = {
    "Aeronautical": {
        "model_file": "SavedModel/Aeronautical.h5",
        "encoder_file": "Encoder/aerona_encoder.npy",
    },
    "Aerospace": {
        "model_file": "SavedModel/Aerospace.h5",
        "encoder_file": "Encoder/aerosp_encoder.npy",
    },
    "AIDS": {
        "model_file": "SavedModel/AIDS.h5",
        "encoder_file": "Encoder/aids_encoder.npy",
    },
    "Automobile": {
        "model_file": "SavedModel/Automobile.h5",
        "encoder_file": "Encoder/auto_encoder.npy",
    },
     "Civil": {
        "model_file": "SavedModel/Civil.h5",
        "encoder_file": "Encoder/civil_encoder.npy",
    },
     "CSE": {
        "model_file": "SavedModel/CSE.h5",
        "encoder_file": "Encoder/cse_encoder.npy",
    },
     "Cybersecurity": {
        "model_file": "SavedModel/Cyber.h5",
        "encoder_file": "Encoder/cyber_encoder.npy",
    },
     "ECE": {
        "model_file": "SavedModel/ECE.h5",
        "encoder_file": "Encoder/ece_encoder.npy",
    },
     "EEE": {
        "model_file": "SavedModel/EEE.h5",
        "encoder_file": "Encoder/eee_encoder.npy",
    },
     "FT": {
        "model_file": "SavedModel/FT.h5",
        "encoder_file": "Encoder/ft_encoder.npy",
    },
    "IT": {
        "model_file": "SavedModel/IT.h5",
        "encoder_file": "Encoder/it_encoder.npy",
    },
     "Mechanical": {
        "model_file": "SavedModel/Mechanical.h5",
        "encoder_file": "Encoder/mech_encoder.npy",
    },
     "Mechatronics": {
        "model_file": "SavedModel/Mechatronics.h5",
        "encoder_file": "Encoder/mtr_encoder.npy",
    },
}


@app.route('/', methods=['GET', 'POST'])
def career():
    global course
    if request.method == 'POST':
        course = request.json.get('course')
    return render_template("hometest.html")


@app.route('/recommends', methods=['POST', 'GET'])
def result():
    if request.method == 'POST':
        result = request.form
        res = result.to_dict(flat=True)
        arr1 = res.values()
        arr = ([float(value) for value in arr1])
        data = np.array(arr)
        data = data.reshape(1, 1, -1)
        print(data)

        # Check if the course exists in the course data
        if course in course_data:
            course_info = course_data[course]
            rnn_model_file = course_info["model_file"]
            encoder_file = course_info["encoder_file"]

            # Load the RNN model
            rnn_model = load_model(rnn_model_file,  compile=False)
            # Compile the model
            rnn_model.compile(optimizer='adam', loss='categorical_crossentropy', metrics=['accuracy'])

            # Load the label encoder object used during training
            label_encoder = LabelEncoder()
            label_encoder_classes = np.load(encoder_file, allow_pickle=True)
            # Fit the LabelEncoder with the classes
            label_encoder.fit(label_encoder_classes)

            # Make predictions using the loaded RNN model
            predictions = rnn_model.predict(data)
            print(predictions)
            predicted_roles_encoded = np.argmax(predictions, axis=1)
            predicted_role = label_encoder.inverse_transform(predicted_roles_encoded)
            predicted_role = predicted_role[0]  # Extract the single predicted role string
            predicted_role = predicted_role.replace("[", "").replace("]", "").replace("'", "")  # Remove square brackets and single quotes
            print(predicted_role)

            
            # Prepare final recommendations
            final_recommendations = []
            for role, prob in zip(label_encoder.classes_, predictions[0]):
                final_recommendations.append({'role': role, 'probability': prob})

            print(final_recommendations)

            # Render the template with the predicted value
            return render_template("testafter.html", job0 = predicted_role)
        else:
            return "Invalid course"
    else:
        return "Invalid method"

if __name__ == '__main__':
    app.run(debug=False)
