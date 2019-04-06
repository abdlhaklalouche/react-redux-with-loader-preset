/* 
 * Laravel React and Redux Loader Preset
 * Copyright 2019
 * Author Name: Abdelhak Lallouche
 * Author Username: @abdlhaklallouche
 * Author Email: abdlhaklalouche@gmail.com
 * Licensed under MIT (https://github.com/abdlhaklalouche/react-redux-with-loader-preset/LICENSE)
 */

import React, { createElement, lazy, Suspense } from "react";
import { render } from "react-dom";
import { Provider } from "react-redux";
import store from "./store";

export default function() {
  document.querySelectorAll('.load-react-component').forEach((component) => {
    const path = component.getAttribute('data-path');
    const loading = component.getAttribute('data-loading');
    let props = JSON.parse(component.getAttribute('data-props'));
    const Component = lazy(() => import(`./${path}`));
    render(
      <Provider store={store}>
        <Suspense fallback={loading ? <div>Loading...</div> : null}>
          {createElement(Component, props)}
        </Suspense>
      </Provider>
      , component
    );
  });
};