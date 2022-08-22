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