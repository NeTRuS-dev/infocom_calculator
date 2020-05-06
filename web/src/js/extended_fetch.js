export function extendedFetch(url, method, body) {
    return fetch(url, {
        mode: 'cors',
        credentials: 'include',
        method: method,
        body: body
    });
}