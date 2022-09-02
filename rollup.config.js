import babel from '@rollup/plugin-babel';
import commonjs from '@rollup/plugin-commonjs';

export default [
    {
        input: './assets/javascripts/src/header.js',
        output: {
            file: './assets/javascripts/dist/header.js',
            format: 'iife',
            name: 'Header'
        },
        plugins: [
            babel({
                presets: ['@babel/preset-env']
            }),
            commonjs()
        ]
    }
];