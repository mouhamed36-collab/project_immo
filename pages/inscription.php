<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription</title>
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="../css/inscription.css">
</head>

<body>
    <!-- Background Container -->
    <div class="background-container">
        <div class="background-overlay"></div>
        <div class="decorative-elements">
            <div class="decoration decoration-1"></div>
            <div class="decoration decoration-2"></div>
            <div class="decoration decoration-3"></div>
        </div>
    </div>

    <!-- Main Content -->
    <div class="container-fluid min-vh-100 d-flex align-items-center justify-content-center position-relative">
        <div class="row w-100 justify-content-center">
            <div class="col-12 col-sm-10 col-md-8 col-lg-6 col-xl-4">
                <!-- Registration Form Card -->
                <div class="registration-card">
                    <!-- Header -->
                    <div class="text-center mb-4">
                        <div class="logo mb-3">
                            <i class="bi bi-building  fs-1" style="color: #2B1B12;"></i>
                        </div>
                        <h1 class="h3 fw-bold text-dark mb-2">Inscrivez-vous</h1>
                        <p class="text-muted">Rejoignez-nous et commencez votre parcours</p>
                    </div>

                    <!-- Registration Form -->
                    <form id="registrationForm" enctype="multipart/form-data" novalidate method="POST" action="../CRUD/inscriptionModel.php">
                        <!-- Full Name Field -->
                        <div class="mb-3">
                            <label for="fullName" class="form-label fw-medium">
                                <i class="bi bi-person me-2"></i>Nom complet
                            </label>
                            <div class="input-group">
                                <span class="input-group-text bg-light border-end-0">
                                    <i class="bi bi-person text-muted"></i>
                                </span>
                                <input type="text"
                                    class="form-control border-start-0 ps-0"
                                    id="fullName"
                                    name="fullName"
                                    placeholder="Entrez votre nom complet"
                                    required>
                            </div>
                            <div class="invalid-feedback"></div>
                        </div>

                        <!-- Email Field -->
                        <div class="mb-3">
                            <label for="email" class="form-label fw-medium">
                                <i class="bi bi-envelope me-2"></i>Adresse email
                            </label>
                            <div class="input-group">
                                <span class="input-group-text bg-light border-end-0">
                                    <i class="bi bi-envelope text-muted"></i>
                                </span>
                                <input type="email"
                                    class="form-control border-start-0 ps-0"
                                    id="email"
                                    name="email"
                                    placeholder="Entrez votre adresse email"
                                    required>
                            </div>
                            <div class="invalid-feedback"></div>
                        </div>

                        <!-- Phone Number Field -->
                        <div class="mb-3">
                            <label for="number" class="form-label fw-medium">
                                <i class="bi bi-phone me-2"></i>Téléphone
                            </label>
                            <div class="input-group">
                                <span class="input-group-text bg-light border-end-0">
                                    <i class="bi bi-phone text-muted"></i>
                                </span>
                                <input type="number"
                                    class="form-control border-start-0 ps-0"
                                    id="phone"
                                    name="phone"
                                    placeholder="Entrez votre adresse numéro"
                                    required>
                            </div>
                            <div class="invalid-feedback"></div>
                        </div>

                        <!-- File Input -->
                        <div class="mb-3">
                            <label for="formFileSm" class="form-label">Ajouter une photo de profil</label>
                            <input class="form-control form-control-sm" id="formFileSm" name="photo" type="file">
                        </div>

                        <!-- Password Field -->
                        <div class="mb-3">
                            <label for="password" class="form-label fw-medium">
                                <i class="bi bi-lock me-2"></i>Mot de passe
                            </label>
                            <div class="input-group">
                                <span class="input-group-text bg-light border-end-0">
                                    <i class="bi bi-lock text-muted"></i>
                                </span>
                                <input type="password"
                                    class="form-control border-start-0 border-end-0 ps-0"
                                    id="password"
                                    name="password"
                                    placeholder="Créez un mot de passe fort"
                                    required>
                                <button class="btn btn-outline-secondary border-start-0"
                                    type="button"
                                    id="togglePassword">
                                    <i class="bi bi-eye"></i>
                                </button>
                            </div>

                            <!-- Password Strength Indicator -->
                            <div class="password-strength mt-2" id="passwordStrength" style="display: none;">
                                <div class="d-flex align-items-center gap-2">
                                    <div class="progress flex-grow-1" style="height: 6px;">
                                        <div class="progress-bar" role="progressbar"></div>
                                    </div>
                                    <small class="strength-label fw-medium"></small>
                                </div>
                                <div class="password-requirements mt-2">
                                    <small class="text-muted d-block">
                                        <i class="bi bi-check-circle text-success me-1" style="display: none;"></i>
                                        <i class="bi bi-x-circle text-danger me-1"></i>
                                        Au moins 8 caractères
                                    </small>
                                    <small class="text-muted d-block">
                                        <i class="bi bi-check-circle text-success me-1" style="display: none;"></i>
                                        <i class="bi bi-x-circle text-danger me-1"></i>
                                        Contient une majuscule
                                    </small>
                                    <small class="text-muted d-block">
                                        <i class="bi bi-check-circle text-success me-1" style="display: none;"></i>
                                        <i class="bi bi-x-circle text-danger me-1"></i>
                                        Contient un chiffre
                                    </small>
                                    <small class="text-muted d-block">
                                        <i class="bi bi-check-circle text-success me-1" style="display: none;"></i>
                                        <i class="bi bi-x-circle text-danger me-1"></i>
                                        Contient un caractère spécial
                                    </small>
                                </div>
                            </div>

                            <div class="invalid-feedback"></div>
                        </div>

                        <!-- Confirm Password Field -->
                        <div class="mb-4">
                            <label for="confirmPassword" class="form-label fw-medium">
                                <i class="bi bi-lock-fill me-2"></i>Confirmer le mot de passe
                            </label>
                            <div class="input-group">
                                <span class="input-group-text bg-light border-end-0">
                                    <i class="bi bi-lock-fill text-muted"></i>
                                </span>
                                <input type="password"
                                    class="form-control border-start-0 border-end-0 ps-0"
                                    id="confirmPassword"
                                    name="confirmPassword"
                                    placeholder="Confirmez votre mot de passe"
                                    required>
                                <button class="btn btn-outline-secondary border-start-0"
                                    type="button"
                                    id="toggleConfirmPassword">
                                    <i class="bi bi-eye"></i>
                                </button>
                            </div>
                            <div class="invalid-feedback"></div>
                        </div>

                        <!-- Submit Message -->
                        <div id="submitMessage" class="alert d-none" role="alert"></div>

                        <!-- Submit Button -->
                        <button type="submit"
                            class="btn btn-primary btn-lg w-100 fw-semibold submit-btn"
                            id="submitBtn">
                            <span class="btn-text">Créer un compte</span>
                            <span class="btn-loading d-none">
                                <span class="spinner-border spinner-border-sm me-2" role="status"></span>
                                Création du compte...
                            </span>
                        </button>
                    </form>

                    <!-- Footer -->
                    <div class="text-center mt-4">
                        <p class="text-muted mb-0">
                            Vous avez déjà un compte ?
                            <a href="../pages/page de connexion.php" class="text-decoration-none fw-medium" style="color: #2B1B12;">Se connecter</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap 5 JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Custom JavaScript -->
    <script src="../js/inscription.js"></script>
</body>

</html>