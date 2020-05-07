export class DataReceiver {
    receiveResponse(url, method, body) {
        let csrfParam = document.querySelector('meta[name="csrf-param"]').content
        body[csrfParam]=document.querySelector('meta[name="csrf-token"]').content
        return fetch(url, {
            mode: 'cors',
            credentials: 'include',
            headers: {
                'Content-Type': 'application/json',
            },
            method: method,
            body: JSON.stringify(body)
        });
    }
}