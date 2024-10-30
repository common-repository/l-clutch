export function decodeURLParams(params: URLSearchParams) {
  const decodedParams: string[] = [];
  for (const [key, value] of params.entries()) {
    if (key === 'type') {
      decodedParams.push(`${key}=${decodeURIComponent(value)}`);
    } else {
      decodedParams.push(`${key}=${value}`);
    }
  }
  return decodedParams.join('&');
}
