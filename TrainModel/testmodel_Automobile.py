import pandas as pd
import numpy as np
from sklearn.model_selection import train_test_split
from sklearn.preprocessing import LabelEncoder
from keras.models import Sequential
from keras.layers import Dense, LSTM
from keras.callbacks import EarlyStopping

np.random.seed(42)  # Set a fixed random seed for reproducibility

# Load dataset
career = pd.read_csv(r'Dataset/AUTO.data')

# Assigning column names
career.columns = [
    "Alternative Propulsion Technologies",
    "Instrumentation and Control in Automobiles",
    "CAD/CAM",
    "Electrical Systems in Vehicles",
    "Automotive Electronics",
    "Fluid Mechanics in Automotive Systems",
    "Vehicle Guidance and Navigation Systems",
    "Materials in Automotive Engineering",
    "Project Management in Automobile Engineering",
    "Automotive Manufacturing Processes",
    "Structural Analysis in Automotive Engineering",
    "Automotive Structural Design",
    "Internal Combustion Engines",
    "Automotive Propulsion Systems",
    "Automotive Thermodynamics",
    "Vehicle Dynamics and Control",
    "Automotive Safety Engineering",
    "Roles"
]


# Dropping rows with NaN values
career.dropna(how='all', inplace=True)

# Splitting into features and target
X = career.iloc[:, 0:17]  # Features
y = career.iloc[:, 17]    # Target

# Encode target labels
label_encoder = LabelEncoder()
y_encoded = label_encoder.fit_transform(y)

# One-hot encoding for target labels
y_one_hot = pd.get_dummies(y_encoded).values

# Splitting data into training, validation, and test sets
X_train, X_temp, y_train, y_temp = train_test_split(X, y_one_hot, test_size=0.3, random_state=524)
X_val, X_test, y_val, y_test = train_test_split(X_temp, y_temp, test_size=0.5, random_state=524)

# Save the label encoder's classes
np.save('Encoder/auto_encoder.npy', label_encoder.classes_)

# Reshape input data for RNN (3D tensor)
X_train_rnn = X_train.values.reshape(X_train.shape[0], 1, X_train.shape[1])
X_val_rnn = X_val.values.reshape(X_val.shape[0], 1, X_val.shape[1])
X_test_rnn = X_test.values.reshape(X_test.shape[0], 1, X_test.shape[1])

# Build RNN model with LSTM layer
model = Sequential([
    LSTM(64, input_shape=(X_train_rnn.shape[1], X_train_rnn.shape[2])),  # LSTM layer
    Dense(len(label_encoder.classes_), activation='softmax')  
])

# Compile the model
model.compile(optimizer='adam', loss='categorical_crossentropy', metrics=['accuracy'])

# Define early stopping callback
early_stopping = EarlyStopping(monitor='val_loss', patience=5, restore_best_weights=True)  # Adjust patience parameter

# Train the model with early stopping
history = model.fit(X_train_rnn, y_train, epochs=100, batch_size=64, validation_data=(X_val_rnn, y_val), callbacks=[early_stopping])

# Evaluate the model
test_loss, test_accuracy = model.evaluate(X_test_rnn, y_test)
print("Test Loss:", test_loss)
print("Test Accuracy:", test_accuracy)

# Get final training and validation accuracy and loss
final_train_loss = history.history['loss'][-1]
final_val_loss = history.history['val_loss'][-1]
final_train_accuracy = history.history['accuracy'][-1]
final_val_accuracy = history.history['val_accuracy'][-1]

# Print final training and validation accuracy and loss
print("Final Training Loss:", final_train_loss)
print("Final Validation Loss:", final_val_loss)
print("Final Training Accuracy:", final_train_accuracy)
print("Final Validation Accuracy:", final_val_accuracy)

# Analyze if the model is balanced, overfitted, or underfitted
if final_train_accuracy == 1.0 and final_val_accuracy < 1.0:
    print("The model is overfitted.")
elif final_train_accuracy < 1.0 and final_val_accuracy < 1.0:
    print("The model is underfitted.")
else:
    print("The model is balanced.")

# # Save the trained model
model.save('SavedModel/Automobile.h5')

