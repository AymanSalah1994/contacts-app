
let filterCompany = document.getElementById('filter_company_id')
if (filterCompany) {
    filterCompany.addEventListener('change', function () {
        let companyId = this.value || this.options[this.selectedIndex].value;
        //  this.options[this.selectedIndex].value 
        // This is Just for Browser Compatibility ; 
        window.location.href = window.location.href.split('?')[0] + "?company_id=" + companyId;
    });
}

document.querySelectorAll('.btn-delete').forEach((button) => {
    button.addEventListener('click', function (event) {
        event.preventDefault()
        //  Prevent Going/Visiting  the URL-Route of Deletion 
        if (confirm('Are you Sure you Want to Delete?')) {
            let action = this.getAttribute('href')
            // this refers to the Button Object "Since it is the object which called the Function > [button.addEventListener]

            let form = document.getElementById('form-delete')
            form.setAttribute('action', action)
            form.submit()
        }
    })
})


let btnClear = document.getElementById('btn-clear')
if (btnClear) {
    btnClear.addEventListener('click', () => {
        let search = document.getElementById('search')
        let select = document.getElementById('filter_company_id')

        if(search) search.value = ""
        if(select) select.selectedIndex = 0
        window.location.href = window.location.href.split('?')[0]
    })
}


const toggleClearButton = () => {
    // Get Query string 
    let query = location.search
    let pattern = /[?&]search=/
    // The meaning of the Pattern ?
    let button = document.getElementById('btn-clear')

    if(button == undefined) return  ; 
    if (pattern.test(query)) {
        button.style.display = "block"
    }
    else {
        button.style.display = "none"
    }

}
toggleClearButton()