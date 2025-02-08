document.getElementById('codePadForm').addEventListener('submit', async (e) => {
    e.preventDefault();
    const formData = new FormData(e.target);
    
    try {
        const response = await fetch('/codepad/create_pad.php', {
            method: 'POST',
            body: formData
        });
        
        const data = await response.json();
        
        if (data.success) {
            window.location.href = data.url;
        } else {
            alert('Error creating code pad: ' + data.message);
        }
    } catch (error) {
        alert('Error creating code pad: ' + error.message);
    }
});