// admin.js


  
  function addRow() {
    var table = document.getElementById('serviceProvidedTable').getElementsByTagName('tbody')[0];
    var newRow = table.insertRow();
  
    var cell1 = newRow.insertCell(0);
    var cell2 = newRow.insertCell(1);
    var cell3 = newRow.insertCell(2);
    var cell4 = newRow.insertCell(3);
    var cell5 = newRow.insertCell(4);
  
    cell1.textContent = 'SPXXX';
    cell2.textContent = 'New Service';
    cell3.textContent = 'Description';
    cell4.textContent = 'STXXX';
  
    var addButton = document.createElement('button');
    addButton.textContent = 'Add';
    addButton.onclick = function() {
      alert('Adding new row functionality to be implemented.');
    };
  
    var updateButton = document.createElement('button');
    updateButton.textContent = 'Update';
    updateButton.onclick = function() {
      alert('Updating row functionality to be implemented.');
    };
  
    var deleteButton = document.createElement('button');
    deleteButton.textContent = 'Delete';
    deleteButton.onclick = function() {
      table.deleteRow(newRow.rowIndex);
      alert('Row deleted successfully.');
    };
  
    cell5.appendChild(addButton);
    cell5.appendChild(updateButton);
    cell5.appendChild(deleteButton);
  }
  
  function editRow(button) {
    var row = button.parentNode.parentNode;
    alert('Editing row: ' + row.rowIndex);
    // Add logic to edit row
  }
  
  function deleteRow(button) {
    var row = button.parentNode.parentNode;
    row.parentNode.removeChild(row);
    alert('Row deleted successfully.');
  }

  function filterResponses(status) {
    const rows = document.querySelectorAll('#responses-table tbody tr');
    rows.forEach(row => {
        if (status === 'all' || row.classList.contains(status)) {
            row.style.display = 'table-row';
        } else {
            row.style.display = 'none';
        }
    });
}

function markAsCompleted(responseId) {
  if (!confirm('Are you sure you want to mark this as Completed?')) {
      return;
  }
  
  // AJAX request to update status in database
  const xhr = new XMLHttpRequest();
  xhr.open('POST', 'mark_completed.php', true);
  xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
  xhr.onload = function() {
      if (xhr.status >= 200 && xhr.status < 400) {
          // Update status in the table without refreshing the page
          const row = document.querySelector(`#responses-table tbody tr[data-id="${responseId}"]`);
          const statusCell = row.querySelector('.status'); // Ensure you have a cell with this class
          statusCell.textContent = 'Completed';
          statusCell.parentNode.innerHTML = 'Completed'; // Replace the button with text
          row.classList.remove('pending'); // Remove pending class
          row.classList.add('completed'); // Add completed class
      } else {
          alert('Failed to mark as Completed. Please try again.');
      }
  };
  xhr.send(`response_id=${responseId}`);
}

function showAddModal(tableId) {
  const addModalBody = document.getElementById('addModalBody');
  let modalContent = '';
  if (tableId === 'serviceProvidedTable') {
      modalContent = `
          <div class="form-group">
              <label for="serviceName">Name:</label>
              <input type="text" class="form-control" id="serviceName" name="serviceName" required>
          </div>
          <div class="form-group">
              <label for="serviceDescription">Description:</label>
              <textarea class="form-control" id="serviceDescription" name="serviceDescription" required></textarea>
          </div>
          <div class="form-group">
              <label for="typeID">TypeID:</label>
              <input type="text" class="form-control" id="typeID" name="typeID" required>
          </div>
      `;
  } else if (tableId === 'reservationTable') {
      modalContent = `
          <div class="form-group">
              <label for="reservationName">Name:</label>
              <input type="text" class="form-control" id="reservationName" name="reservationName" required>
          </div>
          <div class="form-group">
              <label for="contactNo">Contact No:</label>
              <input type="text" class="form-control" id="contactNo" name="contactNo" required>
          </div>
          <div class="form-group">
              <label for="preferredDate">Preferred Date:</label>
              <input type="date" class="form-control" id="preferredDate" name="preferredDate" required>
          </div>
          <div class="form-group">
              <label for="preferredTime">Preferred Time:</label>
              <input type="time" class="form-control" id="preferredTime" name="preferredTime" required>
          </div>
          <div class="form-group">
              <label for="reservationDescription">Description:</label>
              <textarea class="form-control" id="reservationDescription" name="reservationDescription" required></textarea>
          </div>
          <div class="form-group">
              <label for="status">Status:</label>
              <input type="text" class="form-control" id="status" name="status" required>
          </div>
          <div class="form-group">
              <label for="CUsername">Customer Username:</label>
              <input type="text" class="form-control" id="CUsername" name="CUsername" required>
          </div>
          <div class="form-group">
              <label for="TUsername">Tailor Username:</label>
              <input type="text" class="form-control" id="TUsername" name="TUsername" required>
          </div>
      `;
  }
  addModalBody.innerHTML = modalContent;
  $('#addModal').modal('show');
}


  