<?
// namespace Http\Forms;
// use Core\Validator;

// class LoginForm
// {
//     protected $errors = [];

//     public function validate($email, $password)
//     {
//         if (!Validator::email($email)) {
//             $this->errors['email'] = 'provide valid email';

//         }

//         if (!Validator::password($password)) {
//             $this->errors['password'] = 'provide valid password';
//         }

//         return empty($this->errors);
//     }

//     public function errors() {
//         return $this->errors;
//     }
// }