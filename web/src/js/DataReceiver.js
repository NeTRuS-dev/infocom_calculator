export class DataReceiver {
    async receiveResponse(url, body, method = 'POST') {
        let csrfParam = document.querySelector('meta[name="csrf-param"]').content
        body[csrfParam] = document.querySelector('meta[name="csrf-token"]').content
        let response = await fetch(url, {
            mode: 'cors',
            credentials: 'include',
            headers: {
                'Content-Type': 'application/json',
            },
            method: method,
            body: JSON.stringify(body)
        })
        let data;
        /**
         * dont need to care about errors
         */
        if (response.ok) {
            data = await response.json();

        } else {
            data = {newDisplayValue: ''};
        }
        return data;
    }
}