export function extendedFetch(url, method, body) {
    return fetch(url, {
        mode: 'cors',
        credentials: 'include',
        headers: {
            'Content-Type': 'application/json',
        },
        method: method,
        body: body
    });
}