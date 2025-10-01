import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';

/** @type {import('tailwindcss').Config} */
export default {
    darkMode: 'class',
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],

    theme: {
        extend: {
            fontFamily: {
                primary: ['Satoshi', 'sans-serif'],
                secondary: ['"Cal Sans"', 'sans-serif'],
            },
            fontWeight: {
                regular: 400,
                medium: 500,
                bold: 700,
            },
            lineHeight: {
                DEFAULT: '100%',
                xs: '150%',
            },
            fontSize: {
                '3xs': '0.75rem', // 12px
                '2xs': '0.875rem', // 14px
                xs: '1rem', // 16px
                sm: '1.25rem', // 20px
                md: '1.5rem', // 24px
                lg: '2rem', // 32px
                xl: '2.5rem', // 40px
                '2xl': '2.75rem', // 44px
                '3xl': '3rem', // 48px
                '4xl': '4rem', // 64px
                display: '5rem', // 80px
                giant: '6rem', // 96px
            },

            colors: {
                red: {
                    primary: '#DB1F1F',
                    900: '#711900',
                    800: '#8C2800',
                    700: '#A73A00',
                    600: '#C24D16',
                    500: '#FC3A3B',
                },

                orange: {
                    primary: '#FF7E38',
                    900: '#711900',
                    800: '#8C2800',
                    700: '#A73A00',
                    600: '#C24D16',
                    500: '#DB671E',
                },

                yellow: {
                    primary: '#FFD138',
                    900: '#4D3600',
                    800: '#614800',
                    700: '#755800',
                    600: '#866E00',
                    500: '#A98200',
                },

                lime: {
                    primary: '#A5E412',
                    900: '#144D00',
                    800: '#185800',
                    700: '#2A6D00',
                    600: '#3E8300',
                    500: '#519700',
                },

                green: {
                    primary: '#12E419',
                    900: '#004900',
                    800: '#006F00',
                    700: '#007500',
                    600: '#008B00',
                    500: '#00A100',
                },
                esmerald: {
                    primary: '#12E4A8',
                    900: '#00472A',
                    800: '#005C32',
                    700: '#007243',
                    600: '#008755',
                    500: '#009D68',
                    400: '#00B57D',
                },

                cyan: {
                    primary: '#12E4D9',
                    900: '#004642',
                    800: '#005855',
                    700: '#007069',
                    600: '#00857D',
                    500: '#009A92',
                    400: '#00B0A7',
                },

                brand: {
                    primary: '#3B95FF',
                    900: '#003B84',
                    800: '#004DA1',
                    700: '#0060BD',
                    600: '#0073D6',
                    500: '#2287ED',
                    400: '#4C9CFF',
                },

                indigo: {
                    primary: '#4F39F6',
                    900: '#2218AB',
                    800: '#3A2ACF',
                    700: '#543CEE',
                    600: '#6E4FFF',
                    500: '#8663FF',
                    400: '#A378FF',
                },
                purple: {
                    primary: '#9E39F6',
                    900: '#54009A',
                    800: '#6C0EBA',
                    700: '#8525D8',
                    600: '#9D3BF3',
                    500: '#B552FF',
                    400: '#CD6AFF',
                    300: '#E482FF',
                },

                light: {
                    state: {
                        success: '#03AD0D',
                        warning: '#E0C707',
                        error: '#E72323',
                        neutral: '#209BEE',
                    },
                    text: {
                        high: '#09090A',
                        medium: '#4F4F4F',
                        low: '#707070',
                        light: '#09090A',
                        dark: '#F5F5FD',
                    },
                    icon: {
                        high: '#F5F5FF',
                        medium: '#707070',
                        low: '#7B7B7B',
                        dark: '#09090A',
                        light: '#F5F5FF',
                    },
                    outline: {
                        high: '#99999F',
                        medium: '#C7C7C8',
                        low: '#5E5E64',
                        dark: '#2C2C2D',
                        light: '#E8E9F1',
                    },
                    elevation: {
                        surface: '#FBFBFF',
                        '01dp': '#F7F8FC',
                        '02dp': '#EFEFEF',
                        '03dp': '#E0E0E0',
                        '04dp': '#D0D0D0',
                        '06dp': '#C0C0C0',
                    },
                },

                dark: {
                    state: {
                        success: '#03AD0D',
                        warning: '#E0C707',
                        error: '#E72323',
                        neutral: '#209BEE',
                    },
                    text: {
                        high: '#F5F5FF',
                        medium: '#9C9C9C',
                        low: '#7A7A7A',
                        light: '#F5F5FD',
                        dark: '#09090A',
                    },
                    icon: {
                        high: '#F5F5FF',
                        medium: '#707070',
                        low: '#7B7B7B',
                        dark: '#09090A',
                        light: '#F5F5FF',
                    },
                    outline: {
                        high: '#99999F',
                        medium: '#C7C7C8',
                        low: '#5E5E64',
                        dark: '#2C2C2D',
                        light: '#E8E8F1',
                    },
                    elevation: {
                        surface: '#09090A',
                        '01dp': '#0F0F10',
                        '02dp': '#131314',
                        '03dp': '#151516',
                        '04dp': '#181819',
                        '06dp': '#1C1C1F',
                    },
                },
            },
        },
    },

    plugins: [forms, require('@tailwindcss/typography')],
};
