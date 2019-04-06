import { createStore, combineReducers, applyMiddleware, compose } from "redux";


// Reducers section
import sampleReducer from "./reducers/default"

const reducers = combineReducers({
  sampleReducer
});

// Middleware section
import promise from "redux-promise-middleware";

const middlewares = [
    promise(),
]; 

const enhancers = [
    applyMiddleware(...middlewares)
]; 

const composeEnhancers = 
    process.env.NODE_ENV !== 'production' &&
    typeof window === 'object' &&
    window.__REDUX_DEVTOOLS_EXTENSION_COMPOSE__ ?
    window.__REDUX_DEVTOOLS_EXTENSION_COMPOSE__ : compose;


// Store section
const store = createStore(
    reducers, 
    {},
    composeEnhancers(...enhancers)
);

export default store;