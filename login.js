document.getElementById('loginForm').addEventListener('submit', async (e) => {
    e.preventDefault();
    const formData = new FormData(e.target);
    
    try {
        const response = await fetch('/codepad/auth.php', {
            method: 'POST',
            body: formData
        });
        
        const data = await response.json();
        
        if (data.success) {
            window.location.href = '/codepad/create.php';
        } else {
            alert('Invalid password');
        }
    } catch (error) {
        alert('Error during login: ' + error.message);
    }
});