const express = require('express');
const router = express.Router();
const signup = require('../controller/Register');

router.use('/user', signup);

module.exports = router;
