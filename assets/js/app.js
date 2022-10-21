// any CSS you import will output into a single css file (app.css in this case)
import '../css/app.scss';

// document.addEventListener('DOMContentLoaded', () => {
//   new App();
// })

// class App{
//   constructor(){
//     this.handleCommentForm();
//   }
// }


var dropdownElementList = [].slice.call(document.querySelectorAll('.dropdown-toggle'))
var dropdownList = dropdownElementList.map(function (dropdownToggleEl) {
  return new bootstrap.Dropdown(dropdownToggleEl)
})



// handleCommentForm () => {
    // const commentForm = document.querySelector('form.commentForm')
    // if (null === commentForm) {
      
    // }
    
// };