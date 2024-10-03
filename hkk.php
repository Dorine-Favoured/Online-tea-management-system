// Example: JavaScript form validation for a simple contact form

document.getElementById('contactForm').addEventListener('submit', function(event) {
    var name = document.getElementById('name').value;
    var email = document.getElementById('email').value;
    var phone = document.getElementById('phone').value;

    // Validate name (not empty)
    if (name.trim() === '') {
        alert('Name is required.');
        event.preventDefault(); // Prevent form submission
        return;
    }

    // Validate email format
    var emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    if (!emailPattern.test(email)) {
        alert('Please enter a valid email address.');
        event.preventDefault(); // Prevent form submission
        return;
    }

    // Validate phone number (optional, just a pattern match)
    var phonePattern = /^\d{10}$/;
    if (phone && !phonePattern.test(phone)) {
        alert('Phone number must be 10 digits.');
        event.preventDefault(); // Prevent form submission
        return;
    }

    // Form is valid, proceed with submission
});
