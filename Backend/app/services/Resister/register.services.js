const db = require('../../config/database');

const registerServices = {};

registerServices.signUp = async (data) => {
  let checkemail = await db('User_register')
    .select('userid')
    .where('email', data.email);
  if (checkemail[0]) return 0;
  else return await db('User_register').insert(data);
};

registerServices.login = async (email) => {
  const result = await db('User_register')
    .select('email', 'password', 'name')
    .where('email', email);

  return result;
};

module.exports = registerServices;
