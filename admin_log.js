function checkCredentials() {
    var adminUsername = document.getElementById("adminUsername").value;
    var adminPassword = document.getElementById("adminPassword").value;

    // Check if the entered credentials match the predefined admin credentials
    if (adminUsername === 'admin' && adminPassword === 'password') {
        // Redirect to admin.html if login is successful
        window.location.href = 'admin.html';
    } else {
        // Display an alert for wrong credentials
        alert('Wrong credentials. Please try again.');
    }
}