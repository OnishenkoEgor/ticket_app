function parseResponse(responsePromise) {
    return responsePromise.then(({data}) => data);
}

export {
    parseResponse
}
