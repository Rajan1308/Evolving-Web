import React from 'react';

import text from './text.twig';

import textWithCTA from './text-with-cta.yml';

import textWithBgImage from './text-with-bg-image.yml';

import textWithFormData from './text-with-form.yml';

/**
 * Storybook Definition.
 */
export default { title: 'Molecules/Text' };

export const TextWithCTA = () => (
  <div dangerouslySetInnerHTML={{ __html: text(textWithCTA) }} />
);

export const TextWithBgImage = () => (
  <div dangerouslySetInnerHTML={{ __html: text(textWithBgImage) }} />
);

export const TextWithForm = () => (
  <div dangerouslySetInnerHTML={{ __html: text(textWithFormData) }} />
);
