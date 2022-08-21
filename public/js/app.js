document.getElementById('filter_company_id').addEventListener('change' , function(){
    let companyId = this.value || this.options[this.selectedIndex].value ;
    //  this.options[this.selectedIndex].value 
    // This is Just for Browser Compatibility ; 
    window.location.href = window.location.href.split('?')[0] + "?company_id=" + companyId ; 
}) ; 