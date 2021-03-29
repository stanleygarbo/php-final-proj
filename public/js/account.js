new Vue({
    el:'#formSection',
    data:{
        showLoginForm: true,
        register: false,
        thereIsAnEmptyInput: false,
        emailAlreadyExists: false,
        passwordsDoNotMatch: false,
        invalidLogin: false,
    },
    mounted: function(){
        if(this.getParameterByName('register') == 'true'){
            this.register = true
            this.showLoginForm = false
        }
        console.log('ssd')

        this.thereIsAnEmptyInput = this.getParameterByName('emptyinput') == 'true'
        this.emailAlreadyExists = this.getParameterByName('emailexists') == 'true'
        this.passwordsDoNotMatch = this.getParameterByName('passwordsdontmatch') == 'true'
        this.invalidLogin = this.getParameterByName('invalidlogin') == 'true'
    },
    methods:{
        goBackClickhandler: function(){
            window.history.back()
        },
        toggleClickHandler: function(e){
            e.target.parentElement.parentElement.reset()
            this.thereIsAnEmptyInput = false
            this.emailAlreadyExists = false
            this.passwordsDoNotMatch = false
            this.invalidLogin = false
            
            if(e.target.value === 'login') {
                this.showLoginForm = true
                this.register = false
            }
            else {
                this.showLoginForm = false
                this.register = true
            }
        },
        // https://stackoverflow.com/questions/901115/how-can-i-get-query-string-values-in-javascript
        getParameterByName: function(name, url = window.location.href) {
            name = name.replace(/[\[\]]/g, '\\$&');
            var regex = new RegExp('[?&]' + name + '(=([^&#]*)|&|#|$)'),
                results = regex.exec(url);
            if (!results) return null;
            if (!results[2]) return '';
            return decodeURIComponent(results[2].replace(/\+/g, ' '));
        },
        scrollHandler: function(){
            console.log(window.scrollY)
        }
    }
})