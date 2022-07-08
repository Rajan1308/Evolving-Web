import React from 'react';

import text from './text-block.twig';

import textWithform from './text-block-form.yml';

import textWithcta from './text-block-inline-cta.yml';

/**
 * Storybook Definition.
 */
export default { title: 'Molecules/Text Block' };

export const TextWithInlineForm = () => (
  <div dangerouslySetInnerHTML={{ __html: text(textWithform) }} />
);

export const TextWithCTA = () => (
  <div dangerouslySetInnerHTML={{ __html: text(textWithcta) }} />
);
