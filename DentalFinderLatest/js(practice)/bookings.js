function acceptPatient(id) {
    console.log('acceptPatient called with ID:', id);
    if (id) {
        console.log('Sending fetch request...');
        fetch(`booking.php`, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify({ id: id }) // Send the ID in the request body
        })
        .then(response => {
            console.log('checking...');
            // Check if the response is okay
            if (!response.ok) {
                console.log('error1.');
                throw new Error('Network response was not ok');
            }
            console.log('success1.');
            return response.json(); // Parse JSON if response is okay
        })

    }
}
