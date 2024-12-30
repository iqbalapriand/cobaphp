<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        .dashboard-header {
            background: linear-gradient(135deg, #00b09b, #96c93d);
            padding: 2rem;
            border-radius: 15px;
            color: white;
            margin-bottom: 2rem;
            box-shadow: 0 4px 15px rgba(0,0,0,0.1);
        }

        .welcome-card {
            display: flex;
            align-items: center;
            gap: 1.5rem;
        }

        .welcome-icon {
            font-size: 3rem;
            animation: pulse 2s infinite;
        }

        @keyframes pulse {
            0% { transform: scale(1); }
            50% { transform: scale(1.1); }
            100% { transform: scale(1); }
        }

        .stats-container {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 1.5rem;
            margin-bottom: 2rem;
        }

        .stat-card {
            background: white;
            padding: 1.5rem;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0,0,0,0.1);
            transition: transform 0.3s ease;
        }

        .stat-card:hover {
            transform: translateY(-5px);
        }

        .stat-icon {
            font-size: 2rem;
            margin-bottom: 1rem;
            color: #00b09b;
        }

        .stat-value {
            font-size: 1.5rem;
            font-weight: bold;
            margin-bottom: 0.5rem;
        }

        .stat-label {
            color: #666;
            font-size: 0.9rem;
        }

        .quick-actions {
            background: white;
            padding: 1.5rem;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0,0,0,0.1);
        }

        .action-btn {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            padding: 0.8rem 1.2rem;
            border-radius: 8px;
            background: #f8f9fa;
            border: none;
            transition: all 0.3s ease;
            margin-bottom: 0.5rem;
            color: #333;
            text-decoration: none;
        }

        .action-btn:hover {
            background: #00b09b;
            color: white;
            transform: translateX(5px);
        }

        .toggle-menu-btn {
            position: fixed;
            bottom: 20px;
            right: 20px;
            background: #00b09b;
            color: white;
            border: none;
            padding: 1rem;
            border-radius: 50%;
            box-shadow: 0 4px 15px rgba(0,0,0,0.2);
            transition: all 0.3s ease;
            z-index: 1000;
        }

        .toggle-menu-btn:hover {
            transform: rotate(90deg);
            background: #008f7d;
        }

        /* Responsive adjustments */
        @media (max-width: 768px) {
            .dashboard-header {
                padding: 1.5rem;
            }
            
            .welcome-icon {
                font-size: 2rem;
            }
            
            .stats-container {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>
<body>
    <?php include_once('../_header.php'); ?>

    <div class="container-fluid py-4">
        <div class="dashboard-header">
            <div class="welcome-card">
                <i class="fas fa-hospital-user welcome-icon"></i>
                <div>
                    <h1 class="mb-2">Welcome Back, <?=$_SESSION['user'];?>!</h1>
                    <p class="mb-0">Here's your health center overview for today</p>
                </div>
            </div>
        </div>

        <?php
// Menyambungkan ke database (pastikan sudah terhubung)
include_once('../_header.php');

// Query untuk menghitung jumlah dokter
$sql_doctors = mysqli_query($con, "SELECT COUNT(*) AS total_doctors FROM tb_dokter");
$data_doctors = mysqli_fetch_assoc($sql_doctors);
$total_doctors = $data_doctors['total_doctors'];
$sql_patients = mysqli_query($con, "SELECT COUNT(*) AS total_patients FROM tb_pasien");
$data_patients = mysqli_fetch_assoc($sql_patients);
$total_patients = $data_patients['total_patients'];
$sql_appointments = mysqli_query($con, "SELECT COUNT(*) AS total_appointments FROM tb_rekammedis");
$data_appointments = mysqli_fetch_assoc($sql_appointments);
$total_appointments = $data_appointments['total_appointments'];
$sql_medicine = mysqli_query($con, "SELECT COUNT(*) AS total_medicine FROM tb_obat");
$data_medicine = mysqli_fetch_assoc($sql_medicine);
$total_medicine = $data_medicine['total_medicine'];
?>
            <div class="stats-container">
            <div class="stat-card">
                <i class="fas fa-user-md stat-icon"></i>
                <div class="stat-value"><?= $total_doctors ?></div>
                <div class="stat-label">Active Doctors</div>
            </div>
            <div class="stat-card">
                <i class="fas fa-procedures stat-icon"></i>
                <div class="stat-value"><?= $total_patients ?></div>
                <div class="stat-label">Patients Today</div>
            </div>
            <div class="stat-card">
                <i class="fas fa-calendar-check stat-icon"></i>
                <div class="stat-value"><?= $total_appointments ?></div>
                <div class="stat-label">Appointments</div>
            </div>
            <div class="stat-card">
                <i class="fas fa-pills stat-icon"></i>
                <div class="stat-value"><?= $total_medicine ?></div>
                <div class="stat-label">Medicine Stock</div>
            </div>
        </div>

        <div class="quick-actions">
            <h4 class="mb-3">Quick Actions</h4>15
            <div class="row">
                <div class="col-md-6">
                    <a href="http://localhost/apotek/pasien/data.php" class="action-btn">
                        <i class="fas fa-calendar-plus"></i>
                        Data Patient
                    </a>
                    <a href="http://localhost/apotek/dokter/data.php" class="action-btn">
                        <i class="fas fa-user-plus"></i>
                        Data Doctor
                    </a>
                    <a href="http://localhost/apotek/poliklinik/data.php" class="action-btn">
                        <i class="fas fa-notes-medical"></i>
                        Data Poliklinik
                    </a>
                </div>
                <div class="col-md-6">
                    <a href="http://localhost/apotek/obat/data.php" class="action-btn">
                        <i class="fas fa-prescription"></i>
                        Data Obat
                    </a>
                    <a href="http://localhost/apotek/rekam_medis/data.php" class="action-btn">
                        <i class="fas fa-file-medical"></i>
                        Rekam Medis
                    </a>
                    <a href="http://localhost/apotek/auth/logout.php" class="action-btn">
                        <i class="fas fa-cog"></i>
                        Logout
                    </a>
                </div>
            </div>
        </div>

        <button class="toggle-menu-btn" id="menu-toggle">
            <i class="fas fa-bars"></i>
        </button>
    </div>

    <?php include_once('../_footer.php'); ?>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
    <script>
        // Animate stats on scroll
        const stats = document.querySelectorAll('.stat-card');
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.style.opacity = 1;
                    entry.target.style.transform = 'translateY(0)';
                }
            });
        });

        stats.forEach(stat => {
            stat.style.opacity = 0;
            stat.style.transform = 'translateY(20px)';
            stat.style.transition = 'all 0.6s ease';
            observer.observe(stat);
        });

        // Toggle menu button
        document.getElementById('menu-toggle').addEventListener('click', function(e) {
            e.preventDefault();
            document.body.classList.toggle('toggled');
            this.classList.toggle('active');
        });
    </script>
</body>
</html>