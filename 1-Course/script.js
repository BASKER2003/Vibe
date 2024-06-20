document.addEventListener('DOMContentLoaded', function() {
    const coursesContainer = document.getElementById('courses');
    const categorySelect = document.getElementById('category');

    // Sample course data (replace with actual data)
    const coursesData = [
        {
            "name": "Machine Learning",
            "category": "AI/ML Specialist",
            "youtubeLink": "https://www.coursera.org/learn/machine-learning",
            "imageUrl": "images/logo1.jpg",
            "subtitle": "Beginner Level"
        },
        {
            "name": "Deep Learning Specialization",
            "category": "AI/ML Specialist",
            "youtubeLink": "https://www.coursera.org/specializations/deep-learning",
            "imageUrl": "images/logo1.jpg",
            "subtitle": "Intermediate Level"
        },
        {
            "name": "Applied Data Science with Python Specialization",
            "category": "AI/ML Specialist",
            "youtubeLink": "https://www.coursera.org/specializations/data-science-python",
            "imageUrl": "images/logo1.jpg",
            "subtitle": "Beginner Level"
        },
        {
            "name": "Intro to Machine Learning with PyTorch",
            "category": "AI/ML Specialist",
            "youtubeLink": "https://www.udacity.com/course/deep-learning-pytorch--ud188",
            "imageUrl": "images/logo1.jpg",
            "subtitle": "Beginner Level"
        },
        {
            "name": "AI Programming with Python",
            "category": "AI/ML Specialist",
            "youtubeLink": "https://www.udacity.com/course/ai-programming-python-nanodegree--nd089",
            "imageUrl": "images/logo1.jpg",
            "subtitle": "Beginner Level"
        },
        {
            "name": "Microsoft Professional Program in Artificial Intelligence",
            "category": "AI/ML Specialist",
            "youtubeLink": "https://www.edx.org/professional-certificate/microsoft-professional-program-artificial-intelligence",
            "imageUrl": "images/logo1.jpg",
            "subtitle": "Intermediate Level"
        },
        {
            "name": "Data Science MicroMasters",
            "category": "AI/ML Specialist",
            "youtubeLink": "https://www.edx.org/micromasters/data-science",
            "imageUrl": "images/logo1.jpg",
            "subtitle": "Intermediate Level"
        },
        {
            "name": "Machine Learning Scientist with Python",
            "category": "AI/ML Specialist",
            "youtubeLink": "https://www.datacamp.com/tracks/machine-learning-scientist-with-python",
            "imageUrl": "images/logo1.jpg",
            "subtitle": "Beginner Level"
        },
        {
            "name": "Deep Learning in Python",
            "category": "AI/ML Specialist",
            "youtubeLink": "https://www.datacamp.com/courses/deep-learning-in-python",
            "imageUrl": "images/logo1.jpg",
            "subtitle": "Beginner Level"
        },
        {
            "name": "Practical Deep Learning for Coders",
            "category": "AI/ML Specialist",
            "youtubeLink": "https://www.fast.ai/",
            "imageUrl": "images/logo1.jpg",
            "subtitle": "Intermediate Level"
        },
        {
            "name": "Introduction to Machine Learning for Coders",
            "category": "AI/ML Specialist",
            "youtubeLink": "https://course.fast.ai/ml",
            "imageUrl": "images/logo1.jpg",
            "subtitle": "Intermediate Level"
        },
        {
            "name": "CS229: Machine Learning",
            "category": "AI/ML Specialist",
            "youtubeLink": "https://online.stanford.edu/courses/soe-ycs229-machine-learning",
            "imageUrl": "images/logo1.jpg",
            "subtitle": "Intermediate Level"
        },
        {
            "name": "CS224N: Natural Language Processing with Deep Learning",
            "category": "AI/ML Specialist",
            "youtubeLink": "https://online.stanford.edu/courses/soe-yscs224n-natural-language-processing-deep-learning",
            "imageUrl": "images/logo1.jpg",
            "subtitle": "Intermediate Level"
        },
        {
            "name": "6.036: Introduction to Machine Learning",
            "category": "AI/ML Specialist",
            "youtubeLink": "https://ocw.mit.edu/courses/electrical-engineering-and-computer-science/6-036-introduction-to-machine-learning-fall-2020/index.htm",
            "imageUrl": "images/logo1.jpg",
            "subtitle": "Intermediate Level"
        },
        {
            "name": "6.S191: Introduction to Deep Learning",
            "category": "AI/ML Specialist",
            "youtubeLink": "https://deeplearning.mit.edu/",
            "imageUrl": "images/logo1.jpg",
            "subtitle": "Intermediate Level"
        },
        {
            "name": "APIs: Crash Course",
            "category": "API Integration Specialist",
            "youtubeLink": "https://www.udemy.com/course/apis-crash-course/",
            "imageUrl": "images/logo2.png",
            "subtitle": "Beginner Level"
        },
        {
            "name": "REST API Automation With REST Assured - An Introduction",
            "category": "API Integration Specialist",
            "youtubeLink": "https://www.udemy.com/course/rest-api-automation-with-rest-assured-an-introduction/",
            "imageUrl": "images/logo2.png",
            "subtitle": "Intermediate Level"
        },
        {
            "name": "The Complete API Testing Automation Course",
            "category": "API Integration Specialist",
            "youtubeLink": "https://www.udemy.com/course/the-complete-api-testing-automation-course/",
            "imageUrl": "images/logo2.png",
            "subtitle": "Advanced Level"
        },
        {
            "name": "Learning REST APIs",
            "category": "API Integration Specialist",
            "youtubeLink": "https://www.linkedin.com/learning/learning-rest-apis",
            "imageUrl": "images/logo2.png",
            "subtitle": "Beginner Level"
        },
        {
            "name": "API Testing and Validation",
            "category": "API Integration Specialist",
            "youtubeLink": "https://www.linkedin.com/learning/api-testing-and-validation",
            "imageUrl": "images/logo2.png",
            "subtitle": "Intermediate Level"
        },
        {
            "name": "Building and Securing RESTful APIs in ASP.NET Core",
            "category": "API Integration Specialist",
            "youtubeLink": "https://www.linkedin.com/learning/building-and-securing-restful-apis-in-asp-dot-net-core",
            "imageUrl": "images/logo2.png",
            "subtitle": "Intermediate Level"
        },
        {
            "name": "API Integration and Management with Postman",
            "category": "API Integration Specialist",
            "youtubeLink": "https://www.pluralsight.com/courses/api-integration-management-postman",
            "imageUrl": "images/logo2.png",
            "subtitle": "Intermediate Level"
        },
        {
            "name": "JavaScript and TypeScript APIs with Node.js",
            "category": "API Integration Specialist",
            "youtubeLink": "https://www.pluralsight.com/courses/javascript-typescript-apis-node-js",
            "imageUrl": "images/logo2.png",
            "subtitle": "Intermediate Level"
        },
        {
            "name": "RESTful Web Services with Node.js and Express",
            "category": "API Integration Specialist",
            "youtubeLink": "https://www.pluralsight.com/courses/node-js-express-rest-web-services",
            "imageUrl": "images/logo2.png",
            "subtitle": "Intermediate Level"
        },
        {
            "name": "Application Support Engineer: Real World Support and Processes",
            "category": "Application Support Engineer",
            "youtubeLink": "https://www.udemy.com/course/application-support-engineer/",
            "imageUrl": "images/logo3.png",
            "subtitle": "Intermediate Level"
        },
        {
            "name": "Java Programming Masterclass for Software Developers",
            "category": "Application Support Engineer",
            "youtubeLink": "https://www.udemy.com/courimages/logo15.pngveloper-course/",
            "imageUrl": "images/logo3.png",
            "subtitle": "Intermediate Level"
        },
        {
            "name": "Software Development Life Cycle (SDLC)",
            "category": "Application Support Engineer",
            "youtubeLink": "https://www.linkedin.com/learning/software-development-life-cycle-sdlc-the-complete-series",
            "imageUrl": "images/logo3.png",
            "subtitle": "Intermediate Level"
        },
        {
            "name": "Troubleshooting for IT Support",
            "category": "Application Support Engineer",
            "youtubeLink": "https://www.linkedin.com/learning/troubleshooting-for-it-support",
            "imageUrl": "images/logo3.png",
            "subtitle": "Intermediate Level"
        },
        {
            "name": "SQL for Support Engineers",
            "category": "Application Support Engineer",
            "youtubeLink": "https://www.pluralsight.com/courses/sql-support-engineers",
            "imageUrl": "images/logo3.png",
            "subtitle": "Intermediate Level"
        },
        {
            "name": "Customer Service and Support Fundamentals",
            "category": "Application Support Engineer",
            "youtubeLink": "https://www.pluralsight.com/courses/customer-service-support-fundamentals",
            "imageUrl": "images/logo3.png",
            "subtitle": "Beginner Level"
        },
        {
            "name": "Business Analysis Fundamentals",
            "category": "Business Analyst",
            "youtubeLink": "https://www.udemy.com/course/business-analysis-fundamentals-ba/",
            "imageUrl": "images/logo4.png",
            "subtitle": "Beginner Level"
        },
        {
            "name": "Business Analysis Techniques: Business Process Modeling",
            "category": "Business Analyst",
            "youtubeLink": "https://www.udemy.com/course/business-analysis-techniques-business-process-modeling/",
            "imageUrl": "images/logo4.png",
            "subtitle": "Intermediate Level"
        },
        {
            "name": "Become a Business Analyst",
            "category": "Business Analyst",
            "youtubeLink": "htimages/logo4.pnging/paths/become-a-business-analyst",
            "imageUrl": "images/logo4.png",
            "subtitle": "Beginner Level"
        },
        {
            "name": "Business Analysis Foundations",
            "category": "Business Analyst",
            "youtubeLink": "https://www.linkedin.com/learning/business-analysis-foundations",
            "imageUrl": "images/logo4.png",
            "subtitle": "Intermediate Level"
        },
        {
            "name": "Business Analysis and Process Management Specialization",
            "category": "Business Analyst",
            "youtubeLink": "https://www.coursera.org/specializations/business-analysis-process-management",
            "imageUrl": "images/logo4.png",
            "subtitle": "Intermediate Level"
        },
        {
            "name": "Business Metrics for Data-Driven Companies",
            "category": "Business Analyst",
            "youtubeLink": "https://www.coursera.org/learn/analytics-business-metrics",
            "imageUrl": "images/logo4.png",
            "subtitle": "Intermediate Level"
        },
        {
            "name": "Customer Service Mastery: Delight Every Customer",
            "category": "Customer Service Executive",
            "youtubeLink": "https://www.udemy.com/course/customer-service-mastery-delight-every-customer/",
            "imageUrl": "images/logo5.png",
            "subtitle": "Intermediate Level"
        },
        {
            "name": "Effective Communication Skills",
            "category": "Customer Service Executive",
            "youtubeLink": "https://www.udemy.com/course/effective-communication-skills-training/",
            "imageUrl": "images/logo5.png",
            "subtitle": "Intermediate Level"
        },
        {
            "name": "Customer Service Foundations",
            "category": "Customer Service Executive",
            "youtubeLink": "https://www.linkedin.com/learning/customer-service-foundations",
            "imageUrl": "images/logo5.png",
            "subtitle": "Beginner Level"
        },
        {
            "name": "Soft Skills for Sales Professionals",
            "category": "Customer Service Executive",
            "youtubeLink": "https://www.linkedin.com/learning/soft-skills-for-sales-professionals",
            "imageUrl": "images/logo5.png",
            "subtitle": "Intermediate Level"
        },
        {
            "name": "Customer Service Management",
            "category": "Customer Service Executive",
            "youtubeLink": "https://www.coursera.org/learn/customer-service-management",
            "imageUrl": "images/logo5.png",
            "subtitle": "Intermediate Level"
        },
        {
            "name": "Communication Skills for Engineers",
            "category": "Customer Service Executive",
            "youtubeLink": "https://www.coursera.org/learn/communication-skills-for-engineers",
            "imageUrl": "images/logo5.png",
            "subtitle": "Intermediate Level"
        },
        {
            "name": "The Complete Cyber Security Course: Hackers Exposed!",
            "category": "Cyber Security Specialist",
            "youtubeLink": "https://www.udemy.com/course/the-complete-internet-security-privacy-course-volume-1/",
            "imageUrl": "images/logo6.png",
            "subtitle": "Intermediate Level"
        },
        {
            "name": "Cybersecurity Foundations",
            "category": "Cyber Security Specialist",
            "youtubeLink": "https://www.linkedin.com/learning/cybersecurity-foundations",
            "imageUrl": "images/logo6.png",
            "subtitle": "Intermediate Level"
        },
        {
            "name": "Certified Information Security Manager (CISM) Cert Prep",
            "category": "Cyber Security Specialist",
            "youtubeLink": "https://www.linkedin.com/learning/cert-prep-certified-information-security-manager-cism",
            "imageUrl": "images/logo6.png",
            "subtitle": "Advanced Level"
        },
        {
            "name": "Cybersecurity Specialization",
            "category": "Cyber Security Specialist",
            "youtubeLink": "https://www.coursera.org/specializations/cyber-security",
            "imageUrl": "images/logo6.png",
            "subtitle": "Advanced Level"
        },
        {
            "name": "Introduction to Cyber Security Specialization",
            "category": "Cyber Security Specialist",
            "youtubeLink": "https://www.coursera.org/specializations/intro-cyber-security",
            "imageUrl": "images/logo6.png",
            "subtitle": "Beginner Level"
        },
        {
            "name": "Data Science Specialization",
            "category": "Data Scientist",
            "youtubeLink": "https://www.coursera.org/specializations/jhu-data-science",
            "imageUrl": "images/logo7.jpg",
            "subtitle": "Intermediate Level"
        },
        {
            "name": "Machine Learning",
            "category": "Data Scientist",
            "youtubeLink": "https://www.coursera.org/learn/machine-learning",
            "imageUrl": "images/logo7.jpg",
            "subtitle": "Intermediate Level"
        },
        {
            "name": "Python for Data Science and Machine Learning Bootcamp",
            "category": "Data Scientist",
            "youtubeLink": "https://www.coursera.org/learn/python-for-data-science",
            "imageUrl": "images/logo7.jpg",
            "subtitle": "Beginner Level"
        },
        {
            "name": "Data Science MicroMasters",
            "category": "Data Scientist",
            "youtubeLink": "https://www.edx.org/micromasters/data-science",
            "imageUrl": "images/logo7.jpg",
            "subtitle": "Intermediate Level"
        },
        {
            "name": "Microsoft Professional Program in Data Science",
            "category": "Data Scientist",
            "youtubeLink": "https://www.edx.org/professional-certificate/microsoft-professional-program-data-science",
            "imageUrl": "images/logo7.jpg",
            "subtitle": "Intermediate Level"
        },
        {
            "name": "Data Scientist Nanodegree",
            "category": "Data Scientist",
            "youtubeLink": "https://www.udacity.com/course/data-scientist-nanodegree--nd025",
            "imageUrl": "images/logo7.jpg",
            "subtitle": "Intermediate Level"
        },
        {
            "name": "Machine Learning Engineer Nanodegree",
            "category": "Data Scientist",
            "youtubeLink": "https://www.udacity.com/course/machine-learning-engineer-nanodegree--nd009t",
            "imageUrl": "images/logo7.jpg",
            "subtitle": "Intermediate Level"
        },
        {
            "name": "The Ultimate MySQL Bootcamp: Go from SQL Beginner to Expert",
            "category": "Database Administrator",
            "youtubeLink": "https://www.udemy.com/course/the-ultimate-mysql-bootcamp-go-from-sql-beginner-to-expert/",
            "imageUrl": "images/logo8.png",
            "subtitle": "Intermediate Level"
        },
        {
            "name": "SQL for Data Science: SQL Server, PostgreSQL, SQLite, MySQL",
            "category": "Database Administrator",
            "youtubeLink": "https://www.udemy.com/course/sql-for-data-science/",
            "imageUrl": "images/logo8.png",
            "subtitle": "Intermediate Level"
        },
        {
            "name": "Learning MySQL Development",
            "category": "Database Administrator",
            "youtubeLink": "https://www.linkedin.com/learning/learning-mysql-development",
            "imageUrl": "images/logo8.png",
            "subtitle": "Intermediate Level"
        },
        {
            "name": "SQL Server Administration for Developers",
            "category": "Database Administrator",
            "youtubeLink": "https://www.linkedin.com/learning/sql-server-administration-for-developers",
            "imageUrl": "images/logo8.png",
            "subtitle": "Intermediate Level"
        },
        {
            "name": "Database Management Essentials",
            "category": "Database Administrator",
            "youtubeLink": "https://www.coursera.org/learn/database-management",
            "imageUrl": "images/logo8.png",
            "subtitle": "Intermediate Level"
        },
        {
            "name": "SQL for Data Science",
            "category": "Database Administrator",
            "youtubeLink": "https://www.coursera.org/learn/sql-for-data-science",
            "imageUrl": "images/logo8.png",
            "subtitle": "Beginner Level"
        },
        {
            "name": "Graphic Design Masterclass - Learn GREAT Design",
            "category": "Graphics Designer",
            "youtubeLink": "https://www.udemy.com/course/graphic-design-masterclass/",
            "imageUrl": "images/logo9.jpg",
            "subtitle": "Intermediate Level"
        },
        {
            "name": "Learning Graphic Design: Layouts",
            "category": "Graphics Designer",
            "youtubeLink": "https://www.linkedin.com/learning/learning-graphic-design-layouts",
            "imageUrl": "images/logo9.jpg",
            "subtitle": "Intermediate Level"
        },
        {
            "name": "Photoshop CC 2020 Essential Training: The Basics",
            "category": "Graphics Designer",
            "youtubeLink": "https://www.linkedin.com/learning/photoshop-2020-essential-training-the-basics",
            "imageUrl": "images/logo9.jpg",
            "subtitle": "Beginner Level"
        },
        {
            "name": "Graphic Design Specialization",
            "category": "Graphics Designer",
            "youtubeLink": "https://www.coursera.org/specializations/graphic-design",
            "imageUrl": "images/logo9.jpg",
            "subtitle": "Intermediate Level"
        },
        {
            "name": "Adobe Illustrator for Absolute Beginners",
            "category": "Graphics Designer",
            "youtubeLink": "https://www.coursera.org/projects/adobe-illustrator-for-absolute-beginners",
            "imageUrl": "images/logo9.jpg",
            "subtitle": "Beginner Level"
        },
        {
            "name": "Complete Hardware Design and Integration Guide",
            "category": "Hardware Engineer",
            "youtubeLink": "https://www.udemy.com/course/hardware-design/",
            "imageUrl": "images/logo10.png",
            "subtitle": "Intermediate Level"
        },
        {
            "name": "Learning FPGA Development",
            "category": "Hardware Engineer",
            "youtubeLink": "https://www.linkedin.com/learning/learning-fpga-development",
            "imageUrl": "images/logo10.png",
            "subtitle": "Intermediate Level"
        },
        {
            "name": "Learning PCB Design",
            "category": "Hardware Engineer",
            "youtubeLink": "https://www.linkedin.com/learning/learning-pcb-design",
            "imageUrl": "images/logo10.png",
            "subtitle": "Intermediate Level"
        },
        {
            "name": "Hardware Description Languages for FPGA Design",
            "category": "Hardware Engineer",
            "youtubeLink": "https://www.coursera.org/learn/hardware-description-languages-fpga-design",
            "imageUrl": "images/logo10.png",
            "subtitle": "Intermediate Level"
        },
        {
            "name": "Embedded Hardware and Operating Systems",
            "category": "Hardware Engineer",
            "youtubeLink": "https://www.coursera.org/learn/embedded-operating-system",
            "imageUrl": "images/logo10.png",
            "subtitle": "Intermediate Level"
        },
        {
            "name": "Help Desk Support Specialist Training",
            "category": "Helpdesk Engineer",
            "youtubeLink": "https://www.udemy.com/course/help-desk-support-specialist-training/",
            "imageUrl": "images/logo11.png",
            "subtitle": "Beginner Level"
        },
        {
            "name": "IT Support/Help Desk Technician Course",
            "category": "Helpdesk Engineer",
            "youtubeLink": "https://www.udemy.com/course/it-support-help-desk-technician-course/",
            "imageUrl": "images/logo11.png",
            "subtitle": "Beginner Level"
        },
        {
            "name": "Customer Service in IT",
            "category": "Helpdesk Engineer",
            "youtubeLink": "https://www.linkedin.com/learning/customer-service-in-it",
            "imageUrl": "images/logo11.png",
            "subtitle": "Beginner Level"
        },
        {
            "name": "Help Desk Handbook for End Users",
            "category": "Helpdesk Engineer",
            "youtubeLink": "https://www.linkedin.com/learning/help-desk-handbook-for-end-users",
            "imageUrl": "images/logo11.png",
            "subtitle": "Beginner Level"
        },
        {
            "name": "IT Support: Troubleshooting and Debugging Techniques",
            "category": "Helpdesk Engineer",
            "youtubeLink": "https://www.coursera.org/learn/troubleshooting-debugging-techniques",
            "imageUrl": "images/logo11.png",
            "subtitle": "Beginner Level"
        },
        {
            "name": "The Complete Cyber Security Course: Hackers Exposed!",
            "category": "Information Security Specialist",
            "youtubeLink": "https://www.udemy.com/course/the-complete-cyber-security-course/",
            "imageUrl": "images/logo12.png",
            "subtitle": "Intermediate Level"
        },
        {
            "name": "Cybersecurity Essentials",
            "category": "Information Security Specialist",
            "youtubeLink": "https://www.udemy.com/course/cybersecurity-essentials/",
            "imageUrl": "images/logo12.png",
            "subtitle": "Beginner Level"
        },
        {
            "name": "Cybersecurity Foundations",
            "category": "Information Security Specialist",
            "youtubeLink": "https://www.linkedin.com/learning/cybersecurity-foundations",
            "imageUrl": "images/logo12.png",
            "subtitle": "Beginner Level"
        },
        {
            "name": "Certified Information Security Manager (CISM) Cert Prep",
            "category": "Information Security Specialist",
            "youtubeLink": "https://www.linkedin.com/learning/cert-prep-certified-information-security-manager-cism",
            "imageUrl": "images/logo12.png",
            "subtitle": "Intermediate Level"
        },
        {
            "name": "Cybersecurity Specialization",
            "category": "Information Security Specialist",
            "youtubeLink": "https://www.coursera.org/specializations/cyber-security",
            "imageUrl": "images/logo12.png",
            "subtitle": "Intermediate Level"
        },
        {
            "name": "Introduction to Cyber Security Specialization",
            "category": "Information Security Specialist",
            "youtubeLink": "https://www.coursera.org/specializations/intro-cyber-security",
            "imageUrl": "images/logo12.png",
            "subtitle": "Beginner Level"
        },
        {
            "name": "Cisco CCNA 200-301 Complete Course",
            "category": "Networking Engineer",
            "youtubeLink": "https://www.udemy.com/course/cisco-ccna-200-301-complete-course/",
            "imageUrl": "images/logo13.png",
            "subtitle": "Intermediate Level"
        },
        {
            "name": "Networking Fundamentals: Master the OSI Model & TCP/IP Protocols",
            "category": "Networking Engineer",
            "youtubeLink": "https://www.udemy.com/course/networking-fundamentals-master-the-osi-tcpip-model/",
            "imageUrl": "images/logo13.png",
            "subtitle": "Beginner Level"
        },
        {
            "name": "Cisco CCNA (200-301) Cert Prep: Network Fundamentals and Access",
            "category": "Networking Engineer",
            "youtubeLink": "https://www.linkedin.com/learning/cisco-ccna-200-301-cert-prep-network-fundamentals-and-access",
            "imageUrl": "images/logo13.png",
            "subtitle": "Intermediate Level"
        },
        {
            "name": "CompTIA Network+ (N10-008) Cert Prep: 1 Understanding Networks",
            "category": "Networking Engineer",
            "youtubeLink": "https://www.linkedin.com/learning/comptia-network-plus-n10-008-cert-prep-1-understanding-networks",
            "imageUrl": "images/logo13.png",
            "subtitle": "Intermediate Level"
        },
        {
            "name": "Networking in Google Cloud",
            "category": "Networking Engineer",
            "youtubeLink": "https://www.coursera.org/learn/networking-google-cloud",
            "imageUrl": "images/logo13.png",
            "subtitle": "Intermediate Level"
        },
        {
            "name": "The Bits and Bytes of Computer Networking",
            "category": "Networking Engineer",
            "youtubeLink": "https://www.coursera.org/learn/computer-networking",
            "imageUrl": "images/logo13.png",
            "subtitle": "Beginner Level"
        },
        {
            "name": "Project Management Professional (PMP) - 6th Edition",
            "category": "Project Manager",
            "youtubeLink": "https://www.udemy.com/course/project-management-professional-pmp-6th-edition/",
            "imageUrl": "images/logo14.png",
            "subtitle": "Intermediate Level"
        },
        {
            "name": "Agile Project Management",
            "category": "Project Manager",
            "youtubeLink": "https://www.udemy.com/course/agile-project-management/",
            "imageUrl": "images/logo14.png",
            "subtitle": "Intermediate Level"
        },
        {
            "name": "Project Management Foundations",
            "category": "Project Manager",
            "youtubeLink": "https://www.linkedin.com/learning/project-management-foundations",
            "imageUrl": "images/logo14.png",
            "subtitle": "Beginner Level"
        },
        {
            "name": "Agile Project Management",
            "category": "Project Manager",
            "youtubeLink": "https://www.linkedin.com/learning/agile-project-management",
            "imageUrl": "images/logo14.png",
            "subtitle": "Intermediate Level"
        },
        {
            "name": "Project Management Principles and Practices",
            "category": "Project Manager",
            "youtubeLink": "https://www.coursera.org/learn/uva-darden-project-management",
            "imageUrl": "images/logo14.png",
            "subtitle": "Intermediate Level"
        },
        {
            "name": "Agile with Atlassian Jira",
            "category": "Project Manager",
            "youtubeLink": "https://www.coursera.org/learn/agile-atlassian-jira",
            "imageUrl": "images/logo14.png",
            "subtitle": "Intermediate Level"
        },
        {
            "name": "The Complete Web Developer Course 2.0",
            "category": "Software Developer",
            "youtubeLink": "https://www.udemy.com/course/the-complete-web-developer-course-2/",
            "imageUrl": "images/logo15.png",
            "subtitle": "Intermediate Level"
        },
        {
            "name": "Complete Python Bootcamp: Go from zero to hero in Python 3",
            "category": "Software Developer",
            "youtubeLink": "https://www.udemy.com/course/complete-python-bootcamp/",
            "imageUrl": "images/logo15.png",
            "subtitle": "Beginner Level"
        },
        {
            "name": "Become a React Developer",
            "category": "Software Developer",
            "youtubeLink": "https://www.linkedin.com/learning/paths/become-a-react-developer",
            "imageUrl": "images/logo15.png",
            "subtitle": "Intermediate Level"
        },
        {
            "name": "Java Essential Training",
            "category": "Software Developer",
            "youtubeLink": "https://www.linkedin.com/learning/java-essential-training",
            "imageUrl": "images/logo15.png",
            "subtitle": "Intermediate Level"
        },
        {
            "name": "Full Stack Web and Multiplatform Mobile App Development Specialization",
            "category": "Software Developer",
            "youtubeLink": "https://www.coursera.org/specializations/full-stack-mobile-app-development",
            "imageUrl": "images/logo15.png",
            "subtitle": "Intermediate Level"
        },
        {
            "name": "Python for Everybody Specialization",
            "category": "Software Developer",
            "youtubeLink": "https://www.coursera.org/specializations/python",
            "imageUrl": "images/logo15.png",
            "subtitle": "Beginner Level"
        },
        {
            "name": "Software Testing Masterclass",
            "category": "Software Tester",
            "youtubeLink": "https://www.udemy.com/course/software-testing-masterclass/",
            "imageUrl": "images/logo16.jpg",
            "subtitle": "Intermediate Level"
        },
        {
            "name": "Selenium WebDriver with Java - Basics to Advanced& Interview",
            "category": "Software Tester",
            "youtubeLink": "https://www.udemy.com/course/selenium-real-time-examplesinterview-questions/",
            "imageUrl": "images/logo16.jpg",
            "subtitle": "Intermediate Level"
        },
        {
            "name": "Software Testing Foundations",
            "category": "Software Tester",
            "youtubeLink": "https://www.linkedin.com/learning/software-testing-foundations",
            "imageUrl": "images/logo16.jpg",
            "subtitle": "Beginner Level"
        },
        {
            "name": "Learning Selenium",
            "category": "Software Tester",
            "youtubeLink": "https://www.linkedin.com/learning/learning-selenium",
            "imageUrl": "images/logo16.jpg",
            "subtitle": "Intermediate Level"
        },
        {
            "name": "Software Testing and Automation Specialization",
            "category": "Software Tester",
            "youtubeLink": "https://www.coursera.org/specializations/software-testing-automation",
            "imageUrl": "images/logo16.jpg",
            "subtitle": "Intermediate Level"
        },
        {
            "name": "Automated Software Testing: Practical Skills for Java Developers",
            "category": "Software Tester",
            "youtubeLink": "https://www.coursera.org/learn/automated-software-testing",
            "imageUrl": "images/logo16.jpg",
            "subtitle": "Intermediate Level"
        },
        {
            "name": "Technical Writing: Master Your Writing Career",
            "category": "Technical Writer",
            "youtubeLink": "https://www.udemy.com/course/technical-writing-process/",
            "imageUrl": "images/logo17.png",
            "subtitle": "Beginner Level"
        },
        {
            "name": "Technical Writing: Documentation on Software Projects",
            "category": "Technical Writer",
            "youtubeLink": "https://www.linkedin.com/learning/technical-writing-documentation-on-software-projects",
            "imageUrl": "images/logo17.png",
            "subtitle": "Intermediate Level"
        },
        {
            "name": "Writing Technical Reports",
            "category": "Technical Writer",
            "youtubeLink": "https://www.linkedin.com/learning/writing-technical-reports",
            "imageUrl": "images/logo17.png",
            "subtitle": "Intermediate Level"
        },
        {
            "name": "Technical Writing",
            "category": "Technical Writer",
            "youtubeLink": "https://www.coursera.org/learn/technical-writing",
            "imageUrl": "images/logo17.png",
            "subtitle": "Beginner Level"
        },
        {
            "name": "The Complete CIO Leadership Course",
            "category": "Chief Information Officer",
            "youtubeLink": "https://www.udemy.com/course/the-complete-cio-leadership-course/",
            "imageUrl": "images/logo18.jpg",
            "subtitle": "Advanced Level"
        },
        {
            "name": "Becoming a Chief Information Officer (CIO)",
            "category": "Chief Information Officer",
            "youtubeLink": "https://www.linkedin.com/learning/paths/become-a-chief-information-officer-cio",
            "imageUrl": "images/logo18.jpg",
            "subtitle": "Advanced Level"
        },
        {
            "name": "IT Leadership: Making the Transition",
            "category": "Chief Information Officer",
            "youtubeLink": "https://www.linkedin.com/learning/it-leadership-making-the-transition",
            "imageUrl": "images/logo18.jpg",
            "subtitle": "Intermediate Level"
        },
        {
            "name": "Digital Transformation in Business Specialization",
            "category": "Chief Information Officer",
            "youtubeLink": "https://www.coursera.org/specializations/digital-transformation",
            "imageUrl": "images/logo18.jpg",
            "subtitle": "Advanced Level"
        },
        {
            "name": "IT Fundamentals for Business Professionals",
            "category": "Chief Information Officer",
            "youtubeLink": "https://www.coursera.org/learn/it-fundamentals-business-professionals",
            "imageUrl": "images/logo18.jpg",
            "subtitle": "Beginner Level"
        },
        {
            "name": "IT Support/Help Desk Analyst",
            "category": "IT Support Specialist",
            "youtubeLink": "https://www.udemy.com/course/it-support-help-desk-analyst/",
            "imageUrl": "images/logo19.png",
            "subtitle": "Beginner Level"
        },
        {
            "name": "IT Service Desk: Service Requests and Incidents",
            "category": "IT Support Specialist",
            "youtubeLink": "https://www.linkedin.com/learning/it-service-desk-service-requests-and-incidents",
            "imageUrl": "images/logo19.png",
            "subtitle": "Intermediate Level"
        },
        {
            "name": "IT Service Desk Careers and Certifications: First Steps",
            "category": "IT Support Specialist",
            "youtubeLink": "https://www.linkedin.com/learning/it-service-desk-careers-and-certifications-first-steps",
            "imageUrl": "images/logo19.png",
            "subtitle": "Beginner Level"
        },
        {
            "name": "Google IT Support Professional Certificate",
            "category": "IT Support Specialist",
            "youtubeLink": "https://www.coursera.org/professional-certificates/google-it-support",
            "imageUrl": "images/logo19.png",
            "subtitle": "Intermediate Level"
        }

    ];

    // Function to render course cards based on selected category
    function renderCourses(category) {
        coursesContainer.innerHTML = '';
        let filteredCourses = coursesData;

        if (category !== 'all') {
            filteredCourses = coursesData.filter(course => course.category === category);
        }

        filteredCourses.forEach(course => {
            const courseCard = document.createElement('div');
            courseCard.classList.add('card');
            courseCard.innerHTML = `
                <div class="card__img">
                    <img src="${course.imageUrl}" alt="${course.name}">
                </div>
                <div class="card__avatar">
                    <svg><!-- Your avatar SVG here --></svg>
                </div>
                <div class="card__title"> <span class="material-symbols-outlined">school</span> &nbsp;${course.name}</div>
                <div class="card__subtitle"><span class="material-symbols-outlined">signal_cellular_alt</span> &nbsp;${course.subtitle}</div> <!-- Display the subtitle -->
                <div class="card__wrapper"><br><center><br>
                    <a class="card__btn" href="${course.youtubeLink}" target="_blank">Start Now</a>
                </center></div>
            `;
            coursesContainer.appendChild(courseCard);
        });
    }

    // Event listener for category select change
    categorySelect.addEventListener('change', function() {
        const selectedCategory = this.value;
        renderCourses(selectedCategory);
    });

    // Initial rendering
    renderCourses('all');
});
