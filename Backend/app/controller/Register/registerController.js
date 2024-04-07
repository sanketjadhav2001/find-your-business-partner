const schema = require("../../validations/Register/register.validation");
const registerServices = require("../../services/Resister/register.services");
const loginschema = require("../../validations/Register/login.validation");
const bcrypt = require("bcrypt");
const jwt = require("jsonwebtoken");
const signupController = {};
const commonfunction = (
  type,
  success,
  message,
  status,
  data,
  count,
  offset,
  per_page,
  curr_page,
  prev_page,
  next_page
) => {
  switch (type) {
    case "list":
      return {
        success,
        message,
        status,
        count,
        offset,
        per_page,
        curr_page,
        prev_page,
        next_page,
        data,
      };
    default:
      return {
        success,
        message,
        status,
        data,
      };
  }
};

signupController.signup = async (req, res) => {
  const data = req.body;
  try {
    await schema.validateAsync(data);
    data.password = await bcrypt.hash(data.password, 10);
    let res = await registerServices.signUp(data);
    if (res != 0) {
      result = commonfunction("", 1, "Signup succesfully", 200);
    } else result = commonfunction("", 0, "email already exist", 200);
  } catch (err) {
    result = commonfunction("", 0, err, 402);
  }
  res.send(result);
};

signupController.login = async (req, res) => {
  const data = req.body;
  try {
    await loginschema.validateAsync(data);
    const [passwordencoding] = await registerServices.login(data.email);
    if (passwordencoding) {
      const passwordverify = await bcrypt.compare(
        data.password,
        passwordencoding.password
      );
      if (passwordverify) {
        const [user] = await registerServices.login(data.email);

        const token = jwt.sign(
          { email: user.email, name: user.name },
          process.env.JWT_SECRET,
          { expiresIn: "1h" }
        );
        delete user.password;

        result = commonfunction("", 1, "Login Successfully", 200, {
          ...user,
          token,
        });
      } else result = commonfunction("", 0, "Invalid Password", 402, []);
    } else result = commonfunction("", 0, "Email Not Exist ", 402, []);
  } catch (err) {
    result = commonfunction("", 0, err.message, 402, []);
  }
  res.send(result);
};

module.exports = signupController;
