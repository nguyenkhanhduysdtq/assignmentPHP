<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thông Tin Cá Nhân</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: linear-gradient(to right, #74ebd5, #acb6e5);
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }

        .profile-card {
            background-color: white;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            width: 350px;
            text-align: center;
            overflow: hidden;
        }

        .profile-card img {
            width: 100%;
            height: 200px;
            object-fit: cover;
        }

        .profile-card h2 {
            margin: 10px 0;
            font-size: 24px;
            color: #333;
        }

        .profile-card p {
            color: #777;
            margin: 5px 0;
            font-size: 16px;
        }

        .profile-card .details {
            padding: 20px;
        }

        .profile-card .details div {
            margin-bottom: 10px;
        }

        .profile-card .details div span {
            font-weight: bold;
            color: #555;
        }

        .profile-card button {
            background: linear-gradient(to right, #6a11cb, #2575fc);
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
            transition: background 0.3s;
        }

        .profile-card button:hover {
            background: linear-gradient(to right, #2575fc, #6a11cb);
        }
    </style>
</head>

<body>
    <div class="profile-card">
        <img src="https://via.placeholder.com/350x200" alt="Profile Image">
        <h2>Nguyễn Văn A</h2>
        <p>Developer</p>
        <div class="details">
            <div><span>Email:</span> nguyen.vana@example.com</div>
            <div><span>Phone:</span> +84 123 456 789</div>
            <div><span>Address:</span> 123 Đường ABC, TP. HCM</div>
        </div>
        <button>Chỉnh sửa thông tin</button>
    </div>
</body>

</html>