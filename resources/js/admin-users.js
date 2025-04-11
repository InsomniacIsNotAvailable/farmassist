// Fetch and display users
function loadUsers() {
    console.log('Fetching users from the backend...');
    $.get('../../database/user-backend.php', function (data) {
        console.log('Raw response from backend:', data); // Log the raw response
        const tbody = $('#users-table tbody');
        tbody.empty();
        if (data.users && data.users.length > 0) {
            data.users.forEach(user => {
                tbody.append(`
                    <tr>
                        <td>${user.id}</td>
                        <td>${user.username}</td>
                        <td>${user.firstname}</td>
                        <td>${user.lastname}</td>
                        <td>${user.email}</td>
                        <td>${user.contact_number}</td>
                        <td>${user.user_status}</td>
                        <td>
                            <form method="POST" class="edit-user-form">
                                <input type="hidden" name="id" value="${user.id}">
                                <input type="text" name="username" value="${user.username}" required>
                                <input type="text" name="firstname" value="${user.firstname}" required>
                                <input type="text" name="lastname" value="${user.lastname}" required>
                                <input type="email" name="email" value="${user.email}" required>
                                <input type="text" name="contactno" value="${user.contact_number}" required>
                                <select name="user_status" required>
                                    <option value="customer" ${user.user_status === 'customer' ? 'selected' : ''}>Customer</option>
                                    <option value="admin" ${user.user_status === 'admin' ? 'selected' : ''}>Admin</option>
                                </select>
                                <button type="submit">Save</button>
                            </form>
                        </td>
                    </tr>
                `);
            });
        } else {
            console.warn('No users found in the response.');
            tbody.append('<tr><td colspan="8">No users found.</td></tr>');
        }
    }, 'json').fail(function (jqXHR, textStatus, errorThrown) {
        console.error('Error fetching users:', textStatus, errorThrown); // Log AJAX errors
        console.error('Raw response:', jqXHR.responseText); // Log the raw response for debugging
        alert('An error occurred while fetching users. Please try again.');
    });
}

// Add user
$('#add-user-form').on('submit', function (e) {
    e.preventDefault();
    const formData = $(this).serialize() + '&add_user=1';
    console.log('Sending data to backend for adding user:', formData); // Log the data being sent

    $.post('../../database/user-backend.php', formData, function (response) {
        console.log('Response from backend after adding user:', response); // Log the response from the backend

        if (response.error) {
            console.error('Error adding user:', response.error); // Log the error
            alert(response.error); // Show error if any
        } else {
            console.log('User added successfully:', response.message); // Log success message
            alert(response.message); // Show success message
            $('#add-user-form')[0].reset(); // Reset the form fields
            loadUsers(); // Reload the user list
        }
    }, 'json').fail(function (jqXHR, textStatus, errorThrown) {
        console.error('AJAX error while adding user:', textStatus, errorThrown); // Log AJAX errors
        console.error('Raw response:', jqXHR.responseText); // Log the raw response for debugging
        alert('An error occurred while adding the user. Please try again.');
    });
});

// Edit user
$(document).on('submit', '.edit-user-form', function (e) {
    e.preventDefault();
    const formData = $(this).serialize() + '&edit_user=1';
    console.log('Sending data to backend for editing user:', formData); // Log the data being sent

    $.post('../../database/user-backend.php', formData, function (response) {
        console.log('Response from backend after editing user:', response); // Log the response from the backend

        if (response.error) {
            console.error('Error editing user:', response.error); // Log the error
            alert(response.error); // Show error if any
        } else {
            console.log('User edited successfully:', response.message); // Log success message
            alert(response.message); // Show success message
            loadUsers(); // Reload the user list
        }
    }, 'json').fail(function (jqXHR, textStatus, errorThrown) {
        console.error('AJAX error while editing user:', textStatus, errorThrown); // Log AJAX errors
        console.error('Raw response:', jqXHR.responseText); // Log the raw response for debugging
        alert('An error occurred while editing the user. Please try again.');
    });
});

// Initial load
$(document).ready(function () {
    console.log('Document ready. Loading users...');
    loadUsers();
});