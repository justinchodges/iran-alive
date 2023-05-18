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
    },
    {
        input: './assets/javascripts/src/donate-form.js',
        output: {
            file: './assets/javascripts/dist/donate-form.js',
            format: 'iife'
        },
        plugins: [
            babel({
                presets: ['@babel/preset-env']
            }),
            commonjs()
        ]
    },
    {
        input: './assets/javascripts/src/statistic.js',
        output: {
            file: './assets/javascripts/dist/statistic.js',
            format: 'iife'
        },
        plugins: [
            babel({
                presets: ['@babel/preset-env']
            }),
            commonjs()
        ]
    },
    {
        input: './assets/javascripts/src/story-card.js',
        output: {
            file: './assets/javascripts/dist/story-card.js',
            format: 'iife'
        },
        plugins: [
            babel({
                presets: ['@babel/preset-env']
            }),
            commonjs()
        ]
    }
];