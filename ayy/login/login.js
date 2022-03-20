const togglebtn = document.querySelector('#togglebtn');
const divli = document.querySelector('.signup');

togglebtn.addEventListener('click',()=>{
if(divli.style.display==='none'){
    divli.style.display = 'flex';

}
else{
   divli.style.display = 'none';
}
});

const signbtn = document.querySelector('#signbtn');

signbtn.addEventListener('click',()=>{
    if(divli.style.display==='none'){
        divli.style.display = 'flex';
    
    }
    else{
       divli.style.display = 'none';
    }
}
)