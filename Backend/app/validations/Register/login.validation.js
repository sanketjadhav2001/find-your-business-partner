const Joi = require('joi');

const loginschema = Joi.object({
  email: Joi.string()
    .email({
      minDomainSegments: 2,
      tlds: { allow: ['com', 'net'] },
    })
    .required(),
  password: Joi.string().min(3).max(15).required(),
});

module.exports = loginschema;
