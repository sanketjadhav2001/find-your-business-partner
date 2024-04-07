const jwt = require('jsonwebtoken');
//middleware function for authentication export from here
module.exports = () => (req, res, next) => {
  //common function is used for handling errors in below code
  const common_function = (success, message) => {
    return {
      success,
      message,
    };
  };
  let token = req.headers['x-access-token'] || req.headers.authorization;

  if (token) {
    token = token.split(' ')[1];
    jwt.verify(token, process.env.JWT_SECRET, (err, decode) => {
      if (err) {
        if (err.name == 'TokenExpiredError') {
          next(res.send(common_function(0, 'Token Expired')));
        }
        if (err.name == 'UnauthorizedError') {
          next(res.send(common_function(0, 'Invalid token')));
        }
        if (err.name == 'JsonWebTokenError') {
          next(res.send(common_function(0, 'Invalid signature')));
        }
        next(err);
      }
      next();
    });
  } else {
    next(res.send(common_function(0, 'Token Not Found')));
  }
};
