class ZFunctions {
    async ajaxErrorHandler(response){
        let body = await response.json();
        if(!response.ok) 
            throw body;
        return body;
    }

    async fetch(options){
        options = {
            url: options.url,
            method: options.method ?? 'GET',
            headers: options.headers ?? {"Accept":"application/json", "Authorization":(this.getCookie('bearerToken'))?"Bearer "+this.getCookie('bearerToken'):null},
            data: options.data,
            success: (typeof options.success=="function")?options.success:()=>{},
            fail: (typeof options.fail=="function")?options.fail:()=>{},
        }
        
        const requestOptions = {
            method: options.method,
            headers: options.headers,
            body: options.data,
            redirect: 'follow'
        };

        return await fetch(options.url, requestOptions)
                            .then( this.ajaxErrorHandler )
                            .then(options.success)
                            .catch(options.fail);
    }

    setCookie(name,value,days=365) {
        var expires = "";
        if (days) {
            var date = new Date();
            date.setTime(date.getTime() + (days*24*60*60*1000));
            expires = "; expires=" + date.toUTCString();
        }
        document.cookie = name + "=" + (value || "")  + expires + "; path=/";
        return true;
    }

    getCookie(name) {
        var nameEQ = name + "=";
        var ca = document.cookie.split(';');
        for(var i=0;i < ca.length;i++) {
            var c = ca[i];
            while (c.charAt(0)==' ') c = c.substring(1,c.length);
            if (c.indexOf(nameEQ) == 0) return c.substring(nameEQ.length,c.length);
        }
        return null;
    }

    deleteCookie(name) {   
        document.cookie = name +'=; Path=/; Expires=Thu, 01 Jan 1970 00:00:01 GMT;';
        return true;
    }
}