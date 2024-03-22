function checkCredentials() {
    var adminUsername = document.getElementById("adminUsername").value;
    var adminPassword = document.getElementById("adminPassword").value;

    
    if (adminUsername === 'admin' && adminPassword === 'password') {
        // Redirect to admin.html if login is successful
        window.location.href = 'admin.html';
    } else {
        
        alert('Wrong credentials. Please try again.');
    }
}