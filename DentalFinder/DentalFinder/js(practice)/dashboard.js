const sideBar = document.querySelector(".toggle-btn");

sideBar.addEventListener("click", function () {
  document.querySelector("#sidebar").classList.toggle("expand");
});

function viewAccount(name) {
  console.log('acceptPatient called with ID:', name);
  if (name) {
      console.log('Sending fetch request...');
      fetch(`index.php`, {
          method: 'POST',
          headers: {
              'Content-Type': 'application/json'
          },
          body: JSON.stringify({ name: name }) // Send the ID in the request body
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
