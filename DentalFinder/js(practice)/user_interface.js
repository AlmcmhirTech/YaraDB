const stars = document.querySelectorAll('#stars i');
        const ratingInput = document.getElementById('rating-value');
        
        stars.forEach(star => {
            star.addEventListener('click', () => {
                const rating = star.getAttribute('data-value');
                ratingInput.value = rating;

                // Highlight the clicked stars
                stars.forEach(s => {
                    if (s.getAttribute('data-value') <= rating) {
                        s.style.color = 'gold';
                    } else {
                        s.style.color = '';
                    }
                });
            });
        });