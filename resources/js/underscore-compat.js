/**
 * Underscore.js Compatibility Layer
 * 
 * Ensures WordPress media library and blocks work correctly
 * by providing missing underscore.js functions
 */

// Ensure global underscore object exists
if (typeof window !== 'undefined') {
    window._ = window._ || {};
}

// Define underscore compatibility functions
(function() {
    'use strict';
    
    var _ = window._;
    
    // Core utility functions that WordPress depends on
    var underscoreFunctions = {
        
        // Object manipulation
        defaults: function(object) {
            if (object == null) return {};
            
            var sources = Array.prototype.slice.call(arguments, 1);
            for (var i = 0; i < sources.length; i++) {
                var source = sources[i];
                if (source) {
                    for (var key in source) {
                        if (source.hasOwnProperty(key) && object[key] === void 0) {
                            object[key] = source[key];
                        }
                    }
                }
            }
            return object;
        },
        
        extend: function(obj) {
            var sources = Array.prototype.slice.call(arguments, 1);
            for (var i = 0; i < sources.length; i++) {
                var source = sources[i];
                if (source) {
                    for (var key in source) {
                        if (source.hasOwnProperty(key)) {
                            obj[key] = source[key];
                        }
                    }
                }
            }
            return obj;
        },
        
        clone: function(obj) {
            if (!this.isObject(obj)) return obj;
            return this.isArray(obj) ? obj.slice() : this.extend({}, obj);
        },
        
        // Type checking
        isArray: Array.isArray || function(obj) {
            return Object.prototype.toString.call(obj) === '[object Array]';
        },
        
        isObject: function(obj) {
            var type = typeof obj;
            return type === 'function' || type === 'object' && !!obj;
        },
        
        isFunction: function(obj) {
            return typeof obj === 'function';
        },
        
        isString: function(obj) {
            return typeof obj === 'string';
        },
        
        isNumber: function(obj) {
            return typeof obj === 'number';
        },
        
        isBoolean: function(obj) {
            return obj === true || obj === false || Object.prototype.toString.call(obj) === '[object Boolean]';
        },
        
        isUndefined: function(obj) {
            return obj === void 0;
        },
        
        isNull: function(obj) {
            return obj === null;
        },
        
        isEmpty: function(obj) {
            if (obj == null) return true;
            if (this.isArray(obj) || this.isString(obj)) return obj.length === 0;
            for (var key in obj) if (obj.hasOwnProperty(key)) return false;
            return true;
        },
        
        // Collection functions
        each: function(obj, iterator, context) {
            if (obj == null) return obj;
            var i, length;
            if (this.isArray(obj)) {
                for (i = 0, length = obj.length; i < length; i++) {
                    iterator.call(context, obj[i], i, obj);
                }
            } else {
                for (var key in obj) {
                    if (obj.hasOwnProperty(key)) {
                        iterator.call(context, obj[key], key, obj);
                    }
                }
            }
            return obj;
        },
        
        map: function(obj, iterator, context) {
            var results = [];
            if (obj == null) return results;
            var i, length;
            if (this.isArray(obj)) {
                for (i = 0, length = obj.length; i < length; i++) {
                    results.push(iterator.call(context, obj[i], i, obj));
                }
            } else {
                for (var key in obj) {
                    if (obj.hasOwnProperty(key)) {
                        results.push(iterator.call(context, obj[key], key, obj));
                    }
                }
            }
            return results;
        },
        
        filter: function(obj, predicate, context) {
            var results = [];
            if (obj == null) return results;
            this.each(obj, function(value, index, list) {
                if (predicate.call(context, value, index, list)) results.push(value);
            });
            return results;
        },
        
        // Utility functions
        uniqueId: function(prefix) {
            var id = ++this.uniqueId.counter;
            return prefix ? prefix + id : id;
        },
        
        result: function(object, property) {
            if (object == null) return void 0;
            var value = object[property];
            return this.isFunction(value) ? value.call(object) : value;
        },
        
        escape: function(string) {
            if (string == null) return '';
            return ('' + string).replace(/[&<>"']/g, function(match) {
                return {
                    '&': '&amp;',
                    '<': '&lt;',
                    '>': '&gt;',
                    '"': '&quot;',
                    "'": '&#x27;'
                }[match];
            });
        }
    };
    
    // Initialize counter for uniqueId
    underscoreFunctions.uniqueId.counter = 0;
    
    // Add alias for each
    underscoreFunctions.forEach = underscoreFunctions.each;
    
    // Add missing functions to _ object
    for (var func in underscoreFunctions) {
        if (underscoreFunctions.hasOwnProperty(func)) {
            if (!_[func] || typeof _[func] !== 'function') {
                _[func] = underscoreFunctions[func];
            }
        }
    }
    
    // Ensure _ is available globally
    if (typeof window !== 'undefined') {
        window._ = _;
    }
    
    // For CommonJS environments
    if (typeof module !== 'undefined' && module.exports) {
        module.exports = _;
    }
    
})();

console.log('🔧 Underscore.js compatibility layer loaded');
