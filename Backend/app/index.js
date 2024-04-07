const express = require('express');
const index = require('./routers/index');
const files = require('express-fileupload');
const cors = require('cors');
const app = express();
app.use(cors());
app.use(files());
app.use(express.json());
//index root created
app.use('/api', index);

module.exports = app;
