const express = require('express');
// calling controller folder and middleware for authentication
const signupController = require('./registerController');
const router = express.Router();

//all route created on user entity data manupalation methods.
router.post('/signup', signupController.signup);
router.post('/login', signupController.login);
module.exports = router;
