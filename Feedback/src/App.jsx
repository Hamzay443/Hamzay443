import React, { useState } from 'react';
import './App.css';

function FeedbackForm() {
  // State for form fields
  const [formData, setFormData] = useState({
    email: '',
    phoneNumber: '',
    satisfaction: '',
    services: {
      parts: false,
      auction: false,
      support: false,
    },
    feedback: '',
  });

  // State for error messages
  const [errors, setErrors] = useState({
    email: '',
    phoneNumber: '',
    feedback: '',
  });

  // Validation functions
  const emailRegex = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,6}$/;
  const phoneRegex = /^\d{4}[-\s]?\d{4}$/;

  const validateForm = () => {
    const newErrors = {};
    let isValid = true;

    if (!emailRegex.test(formData.email)) {
      newErrors.email = 'Please enter a valid email address';
      isValid = false;
    }

    if (!phoneRegex.test(formData.phoneNumber)) {
      newErrors.phoneNumber = 'Please enter a valid phone number';
      isValid = false;
    }

    if (formData.feedback.length < 20) {
      newErrors.feedback = 'Please provide detailed feedback (minimum 20 characters)';
      isValid = false;
    }

    setErrors(newErrors);
    return isValid;
  };

  // Handle input changes
  const handleInputChange = (e) => {
    const { name, value, type, checked } = e.target;

    if (type === 'checkbox') {
      setFormData((prev) => ({
        ...prev,
        services: {
          ...prev.services,
          [name]: checked,
        },
      }));
    } else {
      setFormData((prev) => ({
        ...prev,
        [name]: value,
      }));
    }
  };

  // Handle form submission
  const handleSubmit = (e) => {
    e.preventDefault();

    if (validateForm()) {
      alert('Thank you for your feedback!');
      setFormData({
        email: '',
        phoneNumber: '',
        satisfaction: '',
        services: {
          parts: false,
          auction: false,
          support: false,
        },
        feedback: '',
      });
    }
  };

  return (
    <div className="container">
      <div className="feedback-form">
        <h2>Customer Feedback Form</h2>
        <form onSubmit={handleSubmit} noValidate>
          <div className="form-group">
            <label htmlFor="email">Email Address:</label>
            <input
              type="email"
              id="email"
              name="email"
              value={formData.email}
              onChange={handleInputChange}
              required
            />
            {errors.email && <div className="error-message">{errors.email}</div>}
          </div>

          <div className="form-group">
            <label htmlFor="phoneNumber">Phone Number:</label>
            <input
              type="tel"
              id="phoneNumber"
              name="phoneNumber"
              value={formData.phoneNumber}
              onChange={handleInputChange}
              required
            />
            {errors.phoneNumber && <div className="error-message">{errors.phoneNumber}</div>}
          </div>

          <div className="form-group">
            <label>How satisfied are you with our service?</label>
            {['very', 'somewhat', 'not'].map((value) => (
              <div className="radio-group" key={value}>
                <input
                  type="radio"
                  name="satisfaction"
                  value={value}
                  id={`${value}Satisfied`}
                  checked={formData.satisfaction === value}
                  onChange={handleInputChange}
                />
                <label htmlFor={`${value}Satisfied`}>
                  {value.charAt(0).toUpperCase() + value.slice(1)} Satisfied
                </label>
              </div>
            ))}
          </div>

          <div className="form-group">
            <label>Which services did you use? (Select all that apply)</label>
            {Object.entries({
              parts: 'Parts Purchase',
              auction: 'Auction Participation',
              support: 'Customer Support'
            }).map(([key, label]) => (
              <div className="checkbox-group" key={key}>
                <input
                  type="checkbox"
                  name={key}
                  id={`${key}Service`}
                  checked={formData.services[key]}
                  onChange={handleInputChange}
                />
                <label htmlFor={`${key}Service`}>
                  {label}
                </label>
              </div>
            ))}
          </div>

          <div className="form-group">
            <label htmlFor="feedback">Detailed Feedback:</label>
            <textarea
              id="feedback"
              name="feedback"
              rows="4"
              value={formData.feedback}
              onChange={handleInputChange}
              required
            />
            {errors.feedback && <div className="error-message">{errors.feedback}</div>}
          </div>

          <div className="submit-container">
            <button type="submit">Submit Feedback</button>
          </div>
        </form>
      </div>
    </div>
  );
}

export default FeedbackForm;
