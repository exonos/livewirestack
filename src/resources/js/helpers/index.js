/**
 * @param request {Object|String}
 * @param search {String}
 * @param selected {Array}
 * @return {Object<url, method, params|data>}
 */
export const body = (request, search, selected) => {
    const simple = request.constructor === String;

    let url = simple ? request : request.url;
    let method = simple ? 'get' : request.method;
    const params = simple ? {} : request.params;

    method = method.toLowerCase();

    const init = {
        method: method,
        headers: {
            'X-Requested-With': 'XMLHttpRequest',
            'Content-Type': 'application/json',
            'Accept': 'application/json',
            'ui': true,
        },
    };

    if (method === 'get') {
        const query = new URLSearchParams(params);

        if (search !== '') {
            query.set('search', search);
        }

        if (selected.length > 0) {
            query.set('selected', JSON.stringify(selected));
        }

        if (query.toString() !== '') {
            url += `?${query.toString()}`;
        }
    } else if (method === 'post') {
        init.body = JSON.stringify({
            ...params,
            search: search,
            selected: selected,
        });
    }

    return {url, init};
};

/**
 * @param message
 * @return {void}
 */
export const warning = (message) => {
    console.warn(`[ui] ${message}`);
};

/**
 * @param message
 * @return {void}
 */
export const error = (message) => {
    console.error(`[ui] ${message}`);
};

/**
 * @param name {String}
 * @param params {Array|Object}
 */
export const dispatchEvent = (name, params = null) => {
    const event = `ui:${name}`;

    window.dispatchEvent(new CustomEvent(event, {detail: params}));
};

/**
 * @param state {Boolean}
 */
export const overflow = (state) => {
    const elements = [...document.querySelectorAll('body, [main-container]')];

    state ?
        elements.forEach((el) => el.classList.add('!overflow-hidden')) :
        elements.forEach((el) => el.classList.remove('!overflow-hidden'));
};


/**
 * @param name {String}
 * @param params {Object|Null}
 * @param prefix {Boolean}
 */
// eslint-disable-next-line max-len
export const event = (name, params = null, prefix = true) => {
    const identification = prefix ? `${name}` : name;

    window.dispatchEvent(new CustomEvent(identification, params ? {detail: params} : {}));
};
