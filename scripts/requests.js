//compiled by typescript
var __assign = (this && this.__assign) || function () {
    __assign = Object.assign || function(t) {
        for (var s, i = 1, n = arguments.length; i < n; i++) {
            s = arguments[i];
            for (var p in s) if (Object.prototype.hasOwnProperty.call(s, p))
                t[p] = s[p];
        }
        return t;
    };
    return __assign.apply(this, arguments);
};
var contentType;
(function (contentType) {
    contentType["json"] = "application/json";
    contentType["form"] = "application/x-www-form-urlencoded";
    contentType["formData"] = "multipart/form-data";
    contentType["text"] = "text/plain";
    contentType["xml"] = "application/xml";
    contentType["html"] = "text/html";
    contentType["image"] = "image/\x2a";
    contentType["pdf"] = "application/pdf";
})(contentType || (contentType = {}));
var HTTPRequest = /** @class */ (function () {
    function HTTPRequest() {
    }
    HTTPRequest.get = function (url, callback, headers) {
        if (headers === void 0) { headers = {}; }
        fetch(url, {
            headers: __assign({}, headers)
        }).then(callback).catch(function (err) {
            return console.error('Error:', err);
        });
    };
    HTTPRequest.post = function (url, body, callback, headers) {
        if (headers === void 0) { headers = {}; }
        fetch(url, {
            method: 'POST',
            headers: __assign({}, headers),
            body: JSON.stringify(body)
        }).then(callback).catch(function (err) {
            return console.error('Error:', err);
        });
    };
    HTTPRequest.put = function (url, body, callback, headers) {
        if (headers === void 0) { headers = {}; }
        fetch(url, {
            method: 'PUT',
            headers: __assign({}, headers),
            body: JSON.stringify(body)
        }).then(callback).catch(function (err) {
            return console.error('Error:', err);
        });
    };
    HTTPRequest.delete = function (url, callback, headers) {
        if (headers === void 0) { headers = {}; }
        fetch(url, {
            method: 'DELETE',
            headers: __assign({}, headers)
        }).then(callback).catch(function (err) {
            return console.error('Error:', err);
        });
    };
    return HTTPRequest;
}());
