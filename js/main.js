document.addEventListener('DOMContentLoaded', function() {
    
    if (document.querySelector('select[name="property_id"]')) {
        fetch('php/get_purchased_properties.php')
            .then(response => response.json())
            .then(data => {
                let select = document.querySelector('select[name="property_id"]');
                data.forEach(property => {
                    let option = document.createElement('option');
                    option.value = property.id;
                    option.text = property.name;
                    select.appendChild(option);
                });
            })
            .catch(error => console.error('Error fetching purchased properties:', error));
    }

    
    if (document.getElementById('purchasedPropertiesTable')) {
        fetch('php/get_purchased_properties.php')
            .then(response => response.json())
            .then(data => {
                let tableBody = '';
                data.forEach(property => {
                    tableBody += `
                        <tr>
                            <td>${property.date_of_purchase}</td>
                            <td>${property.name}</td>
                            <td>${property.total_amount_paid}</td>
                            <td>${property.total_duration}</td>
                        </tr>
                    `;
                });
                document.getElementById('purchasedPropertiesTable').innerHTML = tableBody;
            })
            .catch(error => console.error('Error fetching purchased properties:', error));
    }

    
    if (document.getElementById('soldPropertiesTable')) {
        fetch('php/get_sold_properties.php')
            .then(response => response.json())
            .then(data => {
                let tableBody = '';
                data.forEach(property => {
                    tableBody += `
                        <tr>
                            <td>${property.date_of_purchase}</td>
                            <td>${property.date_of_sale}</td>
                            <td>${property.name}</td>
                            <td>${property.total_selling_amount}</td>
                            <td>${property.next_receiving_date}</td>
                            <td>${property.total_profit}</td>
                        </tr>
                    `;
                });
                document.getElementById('soldPropertiesTable').innerHTML = tableBody;
            })
            .catch(error => console.error('Error fetching sold properties:', error));
    }
});