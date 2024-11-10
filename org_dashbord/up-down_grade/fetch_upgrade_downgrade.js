fetch('fetch_upgrade_downgrade.php')
    .then(response => response.json())
    .then(data => {
        console.log(data.upgrade_requests); // Array of upgrade requests
        console.log(data.downgrade_requests); // Array of downgrade requests
    })
    .catch(error => console.log(error));
