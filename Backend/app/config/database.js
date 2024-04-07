const knex = require('knex');
require('dotenv').config();
const db = knex({
  client: process.env.DB_CLIENT,
  connection: {
    host: process.env.DB_HOST,
    user: process.env.DB_USER,
    password: process.env.DB_PASS,
    database: process.env.DB_NAME,
  },
  debug: true,
  log: {
    warn(message) {},
    error(message) {
      console.log('err', message);
    },
    deprecate(message) {},
    debug(message) {},
  },
});
module.exports = db;
