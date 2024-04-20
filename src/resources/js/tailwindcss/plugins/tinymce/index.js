const plugin = require('tailwindcss/plugin')

module.exports =  plugin(function ({ addComponents, theme }) {
  const styles = {
    '.tox': {
      '&:not(.tox-tinymce-inline)': {
        '.tox-editor-header': {
          padding: '4px 0',
          '&:not(.tox-editor-header--empty)': {
            border: 0,
            boxShadow: 'none',
            '&[data-alloy-vertical-dir="toptobottom"]': {
              borderBottom: `1px solid ${theme('colors.neutral.300')}`,
            },
            '&[data-alloy-vertical-dir="bottomtotop"]': {
              borderTop: `1px solid ${theme('colors.neutral.300')}`,
            },
            '.dark &': {
              backgroundColor: theme('colors.neutral.900'),
              borderColor: theme('colors.neutral.700'),
            },
          },
        },
      },

      '.tox-toolbar, .tox-toolbar__primary, .tox-toolbar-overlord': {
        padding: '0 4px',
        backgroundColor: theme('colors.white'),
        '.dark &': {
          backgroundColor: theme('colors.neutral.900'),
        },
      },

      '.tox-pop__dialog': {
        '.tox-toolbar': {
          padding: '4px 4px',
        },
      },

      '.tox-menubar': {
        padding: `0 ${theme('spacing.1')}`,
      },

      '.tox-toolbar, .tox-toolbar__primary': {
        '.tox-toolbar__group': {
          padding: `0 calc(${theme('spacing.2')} - 1px) 0 ${theme('spacing.2')}`,
          '&:first-child': {
            paddingLeft: theme('spacing.1'),
          },
          '&:last-child': {
            paddingRight: theme('spacing.1'),
          },
        },
      },

      '.tox-toolbar__overflow': {
        border: `1px solid ${theme('colors.neutral.300')}`,
        boxShadow: 'none',
        '.dark &': {
          borderColor: theme('colors.neutral.700'),
        },
      },

      '.tox-menu': {
        backgroundColor: theme('colors.white'),
        boxShadow: theme('boxShadow.sm'),
        border: `1px solid ${theme('colors.neutral.200')}`,
        '.dark &': {
          backgroundColor: theme('colors.neutral.900'),
          borderColor: theme('colors.neutral.700'),
        },
      },

      // Collection toolbars and lists
      '.tox-collection--toolbar, .tox-collection--list': {
        '.tox-collection__item': {
          borderRadius: theme('borderRadius.md'),
          padding: theme('spacing.1'),
          color: theme('colors.neutral.700'),
          '.tox-collection__item-label': {
            '>*': {
              background: 'transparent',
              '.dark &': {
                background: 'transparent',
              },
            },
          },
          svg: {
            fill: theme('colors.neutral.700'),
            '.dark &': {
              fill: theme('colors.neutral.300'),
            },
          },

          '.dark &': {
            color: theme('colors.neutral.200'),
          },

          '&--active, &--enabled': {
            backgroundColor: theme('colors.neutral.100'),
            '.dark &': {
              color: theme('colors.white'),
              backgroundColor: theme('colors.neutral.800'),
              svg: {
                fill: theme('colors.white'),
              },
            },
          },
        },
      },

      // Toolbar buttons
      '.tox-tbtn, .tox-mbtn, .tox-split-button': {
        boxShadow: 'none',
        borderRadius: theme('borderRadius.md'),
        svg: {
          fill: theme('colors.neutral.600'),
          '.dark &': {
            fill: theme('colors.neutral.200'),
          },
        },
        '&:hover, &:focus, &--enabled, &--active, &--bespoke': {
          color: theme('colors.neutral.800'),
          backgroundColor: theme('colors.neutral.100'),
          boxShadow: 'none',
          svg: {
            fill: theme('colors.neutral.800'),
          },
          '.dark &': {
            color: theme('colors.white'),
            backgroundColor: theme('colors.neutral.800'),
            svg: {
              fill: theme('colors.white'),
            },
          },
        },
        '&--select': {
          margin: '5px 1px 5px 0',
        },
      },

      // Regular buttons
      '.tox-button': {
        color: theme('colors.white'),
        backgroundColor: theme('colors.primary.600'),
        border: `1px solid ${theme('colors.transparent')}`,
        fontWeight: theme('fontWeight.medium'),
        lineHeight: '17px',
        fontSize: theme('fontSize.sm'),
        padding: `${theme('spacing.2')} ${theme('spacing[2.5]')}`,
        borderRadius: theme('borderRadius.lg'),
        boxShadow: theme('boxShadow.sm'),
        '&:has(.tox-icon)': {
          padding: `0.3rem ${theme('spacing[2.5]')}`,
        },
        '&:hover': {
          backgroundColor: theme('colors.primary.700'),
        },
        '&:focus': {
          outline: '2px solid transparent',
          'outline-offset': '2px',
          '--tw-ring-inset': 'var(--tw-empty,/*!*/ /*!*/)',
          '--tw-ring-offset-width': '0px',
          '--tw-ring-offset-color': '#fff',
          '--tw-ring-color': theme('colors.primary.600'),
          '--tw-ring-offset-shadow': `var(--tw-ring-inset) 0 0 0 var(--tw-ring-offset-width) var(--tw-ring-offset-color)`,
          '--tw-ring-shadow': `var(--tw-ring-inset) 0 0 0 calc(1px + var(--tw-ring-offset-width)) var(--tw-ring-color)`,
          'box-shadow': `var(--tw-ring-offset-shadow), var(--tw-ring-shadow), var(--tw-shadow)`,
          'border-color': theme('colors.primary.600'),
        },
        '&:disabled': {
          pointerEvents: 'none',
          opacity: '0.6',
        },

        '&--secondary': {
          color: theme('colors.neutral.700'),
          backgroundColor: theme('colors.white'),
          border: `1px solid ${theme('colors.neutral.300')}`,
          '&:hover': {
            backgroundColor: theme('colors.neutral.50'),
          },
          '.dark &': {
            color: theme('colors.white'),
            backgroundColor: theme('colors.neutral.800'),
            borderColor: theme('colors.neutral.700'),
            '&:hover': {
              backgroundColor: theme('colors.neutral.700'),
            },
          },
        },

        '&--naked': {
          color: theme('colors.neutral.700'),
          background: 'transparent',
          boxShadow: 'none',
          svg: {
            fill: theme('colors.neutral.700'),
            '.dark &': {
              fill: theme('colors.white'),
            },
          },
          '&:hover, &.tox-locked': {
            backgroundColor: theme('colors.neutral.100'),
            '.dark &': {
              color: theme('colors.white'),
              backgroundColor: theme('colors.neutral.700'),
            },
          },
        },
      },

      // Dialog
      '.tox-dialog': {
        borderRadius: theme('borderRadius.2xl'),
        boxShadow: theme('boxShadow.lg'),
        border: `1px solid ${theme('colors.neutral.300')}`,
        '.dark &': {
          backgroundColor: theme('colors.neutral.900'),
          borderColor: theme('colors.neutral.700'),
        },
        '.tox-dialog__body-nav-item': {
          color: theme('colors.neutral.700'),
          backgroundColor: 'transparent',
          '.dark &': {
            color: theme('colors.neutral.200'),
            backgroundColor: 'transparent',
          },
          '&:focus, &--active': {
            backgroundColor: theme('colors.primary.50'),
            borderBottom: `2px solid ${theme('colors.primary.800')}`,
            '.dark &': {
              color: theme('colors.primary.100'),
              backgroundColor: theme('colors.primary.700'),
            },
          },
        },

        '.tox-dialog__header': {
          padding: `${theme('spacing.6')} ${theme('spacing.7')}`,
          '.dark &': {
            backgroundColor: theme('colors.neutral.900'),
          },
          '.tox-button': {
            color: theme('colors.neutral.400'),
            backgroundColor: 'transparent',
            boxShadow: 'none',
            padding: 0,
            svg: {
              fill: theme('colors.neutral.400'),
            },
            '&:focus': {
              borderColor: 'transparent',
            },
            '&:hover': {
              color: theme('colors.neutral.500'),
              svg: {
                fill: theme('colors.neutral.500'),
              },
            },
            '.dark &': {
              backgroundColor: 'transparent',
            },
          },
        },

        '.tox-dialog__body': {
          padding: `0 ${theme('spacing[3.5]')}`,
        },

        '.tox-dialog__footer': {
          padding: `${theme('spacing.6')} ${theme('spacing.8')}`,
          paddingTop: 0,
          '.dark &': {
            backgroundColor: theme('colors.neutral.900'),
          },
        },

        '.tox-dialog__title': {
          color: theme('colors.neutral.700'),
          fontSize: theme('fontSize.lg'),
          fontWeight: theme('fontWeight.semibold'),
          lineHeight: theme('lineHeight.6'),
          '.dark &': {
            color: theme('colors.white'),
          },
        },
      },
    },

    '.tox-minimal .tox': {
      '.tox-editor-header': {
        '&:not(.tox-editor-header--empty)': {
          '&[data-alloy-vertical-dir="bottomtotop"]': {
            borderTop: 0,
          },
          '&[data-alloy-vertical-dir="toptobottom"]': {
            borderBottom: 0,
          },
          '.tox-toolbar__primary': {
            justifyContent: 'end',
          },
          '.tox-tbtn': {
            '.tox-icon': {
              svg: {
                transform: 'scale(0.9)',
              },
            },
          },
        },
      },
    },

    // Dialog backdrop
    '.tox-dialog-wrap__backdrop': {
      backgroundColor: 'rgba(var(--color-neutral-900), 0.25)',
      '.dark &': {
        backgroundColor: 'rgba(var(--color-neutral-700), 0.40)',
      },
    },

    '.tox-dropzone': {
      color: theme('colors.neutral.700'),
      backgroundColor: theme('colors.neutral.50'),
      borderRadius: theme('borderRadius.lg'),
      border: `1px solid ${theme('colors.neutral.300')}`,
      '.dark &': {
        color: theme('colors.neutral.200'),
        backgroundColor: theme('colors.neutral.800'),
        borderColor: theme('colors.neutral.700'),
      },
    },

    // Forms
    '.tox-form__group': {
      marginBottom: theme('spacing.3'),
    },

    '.tox-label': {
      color: theme('colors.neutral.700'),
      display: 'block',
      fontSize: theme('fontSize.sm'),
      fontWeight: theme('fontWeight.medium'),
      marginBottom: theme('spacing[1.5]'),
      '.dark &': {
        color: theme('colors.neutral.100'),
      },
    },

    '.tox-listboxfield .tox-listbox--select, .tox-textarea, .tox-textfield, .tox-toolbar-textfield':
      {
        minHeight: 0,
        border: `1px solid ${theme('colors.neutral.300')}`,
        borderRadius: theme('borderRadius.lg'),
        boxShadow: theme('boxShadow.sm'),
        fontSize: theme('fontSize.sm'),
        padding: `${theme('spacing.1')} ${theme('spacing[2.5]')}`,
        '&:disabled': {
          backgroundColor: theme('colors.neutral.200'),
          '.dark &': {
            backgroundColor: theme('colors.neutral.800'),
          },
        },
        '.dark &': {
          backgroundColor: theme('colors.neutral.800'),
          borderColor: theme('colors.neutral.600'),
        },
      },

    '.tox-textarea': {
      borderWidth: 0,
      outline: 0,
      boxShadow: 'none',
      '&:focus': {
        borderWidth: 0,
        outline: 0,
        boxShadow: 'none',
      },
    },

    '.tox-textarea-wrap': {
      border: `1px solid ${theme('colors.neutral.300')}`,
      borderRadius: theme('borderRadius.lg'),
      boxShadow: theme('boxShadow.sm'),
      fontSize: theme('fontSize.sm'),
      '.dark &': {
        backgroundColor: theme('colors.neutral.800'),
        borderColor: theme('colors.neutral.600'),
      },
    },

    '.tox-custom-editor:focus-within, .tox-listboxfield .tox-listbox--select:focus, .tox-textarea-wrap:focus-within, .tox-textfield:focus':
      {
        borderColor: theme('colors.primary.500'),
        boxShadow: `0 0 0 1px ${theme('colors.primary.500')}`,
      },

    'input.tox-checkbox__input:focus+.tox-checkbox__icons': {
      borderRadius: theme('borderRadius.md'),
      boxShadow: `inset 0 0 0 1px ${theme('colors.primary.600')}`,
    },

    '.tox-checkbox__icons .tox-checkbox-icon__checked': {
      svg: {
        fill: theme('colors.primary.600'),
      },
    },

    '.tox-color-input': {
      '.tox-textfield': {
        paddingLeft: '36px',
      },
    },

    '.tox-tinymce': {
      border: `1px solid ${theme('colors.neutral.300')}`,
      borderRadius: theme('borderRadius.lg'),
      '.dark &': {
        borderColor: theme('colors.neutral.700'),
      },
    },
  }

  function appendImportantToStyles(styles) {
    Object.keys(styles).forEach(key => {
      const value = styles[key]

      if (typeof value === 'string' || typeof value === 'number') {
        // Split the string into individual properties and rejoin with !important
        styles[key] = String(value)
          .split(';')
          .map(prop => {
            return `${prop.trim()} !important;`
          })
          .join(' ')
      } else if (typeof value === 'object' && !Array.isArray(value)) {
        // If the value is an object, recursively call the function
        appendImportantToStyles(value)
      }
    })
  }

  appendImportantToStyles(styles)

  addComponents(styles)
})
