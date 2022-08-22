document.getElementById('filter_company_id').addEventListener('change' , function(){
    let companyId = this.value || this.options[this.selectedIndex].value ;
    //  this.options[this.selectedIndex].value 
    // This is Just for Browser Compatibility ; 
    window.location.href = window.location.href.split('?')[0] + "?company_id=" + companyId ; 
}) ; 

document.querySelectorAll('.btn-delete').forEach((button)=>{
    button.addEventListener('click',function(event){
        event.preventDefault() 
        //  Prevent Going/Visiting  the URL-Route of Deletion 
        if(confirm('Are you Sure you Want to Delete?'))
        {
            let action = this.getAttribute('href')
            // this refers to the Button Object "Since it is the object which called the Function > [button.addEventListener]

            let form = document.getElementById('form-delete')
            form.setAttribute('action',action)
            form.submit()
        }
        
    })
})